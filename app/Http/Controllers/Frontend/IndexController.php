<?php

namespace App\Http\Controllers\Frontend;

use toastr;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Quote;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ReportComment;
use App\Http\Traits\imageTrait;
use App\Http\Controllers\Controller;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Validator;
use App\Notifications\NewCommentForAdminNotify;
use App\Notifications\NewCommentForPostOwnerNotify;

class IndexController extends Controller
{
    use imageTrait;

    public function index()
    {

        $posts = Post::with(['media', 'user', 'tags'])
            ->whereHas('category', function ($query) {
                $query->whereStatus(1);
            })
            ->whereHas('user', function ($query) {
                $query->whereStatus(1);
            })
            ->post()
            ->active()
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->withQueryString();

        return view('frontend.index', compact('posts'));
    }

    public function search()
    {

        $posts = Post::with(['media', 'user', 'tags'])
            ->whereHas('category', function ($query) {
                $query->whereStatus(1);
            })
            ->whereHas('user', function ($query) {
                $query->whereStatus(1);
            })
            ->when(request('keyword') != '', function ($query) {
                $query->search(request('keyword'), null, true);
            })
            ->post()
            ->active()
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->withQueryString();

        return view('frontend.index', compact('posts'));
    }

    public function category($slug)
    {
        $category = Category::whereSlug($slug)->orWhere('slug_en', $slug)->orWhere('id', $slug)->whereStatus(1)->first()->id;

        if ($category) {
            $posts = Post::with(['media', 'user', 'tags'])
                ->whereCategoryId($category)
                ->post()
                ->active()
                ->orderBy('id', 'desc')
                ->paginate(5)
                ->withQueryString();

            return view('frontend.index', compact('posts'));
        }

        return redirect()->route('frontend.index');
    }

    public function filterBy_category($slug)
    {
        $categories = Category::get();
        $category = Category::whereSlug($slug)->orWhere('slug_en', $slug)->orWhere('id', $slug)->whereStatus(1)->first()->id;

        if ($category) {
            $posts = Post::with(['media', 'user', 'tags'])
                ->whereCategoryId($category)
                ->post()
                ->active()
                ->orderBy('id', 'desc')
                ->paginate(5)
                ->withQueryString();

            $users = User::whereHas('roles', function ($query) {
                $query->where('name', 'user')->where('client_top', 1);
            })->orderBy('sequential_order', 'asc')->get();

            return view('dar_al_nuzum.filter_by_category_index', compact('posts', 'category', 'categories', 'users'));
        }

        if ($user = auth()->user()->id) {

            if ($category) {
                $posts = Post::with(['media', 'user', 'tags'])
                    ->whereCategoryId($user->category_id)
                    ->post()
                    ->active()
                    ->orderBy('id', 'desc')
                    ->paginate(5)
                    ->withQueryString();

                $users = User::whereHas('roles', function ($query) {
                    $query->where('name', 'user')->where('client_top', 1);
                })->orderBy('sequential_order', 'asc')->get();

                return view('dar_al_nuzum.filter_by_category_index', compact('posts', 'category', 'categories', 'users'));
            }
        }

        return redirect()->route('frontend.index');
    }

    public function tag($slug)
    {
        $tag = Tag::whereSlug($slug)->orWhere('slug_en', $slug)->orWhere('id', $slug)->first()->id;

        if ($tag) {
            $posts = Post::with(['media', 'user', 'tags'])
                ->whereHas('tags', function ($query) use ($slug) {
                    $query->where('slug', $slug)->orWhere('slug_en', $slug);
                })
                ->post()
                ->active()
                ->orderBy('id', 'desc')
                ->paginate(5)
                ->withQueryString();

            return view('frontend.index', compact('posts'));
        }

        return redirect()->route('frontend.index');
    }

    public function archive($date)
    {
        $exploded_date = explode('-', $date);
        $month = $exploded_date[0];
        $year = $exploded_date[1];

        $posts = Post::with(['media', 'user', 'tags'])
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->post()
            ->active()
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->withQueryString();
        return view('frontend.index', compact('posts'));
    }

    public function author($username)
    {
        $user = User::whereUsername($username)->whereStatus(1)->first()->id;

        if ($user) {
            $posts = Post::with(['media', 'user', 'tags'])
                ->whereUserId($user)
                ->post()
                ->active()
                ->orderBy('id', 'desc')
                ->paginate(5)
                ->withQueryString();

            return view('frontend.index', compact('posts'));
        }

        return redirect()->route('frontend.index');
    }

    public function post_show($slug)
    {
        $post = Post::query()
            ->with([
                'category', 'media', 'user', 'tags',
                'approved_comments' => function ($query) {
                    $query->orderBy('id', 'desc');
                }
            ])
            ->whereHas('category', function ($query) {
                $query->whereStatus(1);
            })
            ->whereHas('user', function ($query) {
                $query->whereStatus(1);
            })
            ->whereSlug($slug)
            ->active()
            ->first();

        if ($post) {

            $blade = $post->post_type == 'post' ? 'post' : 'page';

            return view('frontend.' . $blade, compact('post'));
        } else {
            return redirect()->route('frontend.index');
        }
    }

    public function store_comment(Request $request, $slug)
    {
        $validation = Validator::make($request->all(), [
            //'name'      => 'required',
            //'email'     => 'required|email',
            'url'       => 'nullable|url',
            'comment'   => 'required|min:10',
        ]);
        if ($validation->fails()) {
            toastr()->error(__('Frontend/general.empty_field'), __('Frontend/general.something_was_wrong'));
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $post = Post::whereSlug($slug)->wherePostType('post')->whereStatus(1)->first();
        if ($post) {

            $userId = auth()->check() ? auth()->id() : null;
            $data['name']           = auth()->user()->name; //$request->name;
            $data['email']          =  auth()->user()->email; //$request->email;
            $data['url']            = $request->url;
            $data['ip_address']     = $request->ip();
            $data['comment']        = Purify::clean($request->comment);
            $data['post_id']        = $post->id;
            $data['user_id']        = $userId;

            $comment = $post->comments()->create($data);

            if (auth()->guest() || auth()->id() != $post->user_id) {
                $post->user->notify(new NewCommentForPostOwnerNotify($comment));
            }

            User::whereHas('roles', function ($query) {
                $query->whereIn('name', ['admin', 'editor']);
            })->each(function ($admin, $key) use ($comment) {
                $admin->notify(new NewCommentForAdminNotify($comment));
            });
            toastr()->success(__('Frontend/general.comment_added_successfully'));
            return redirect()->back();
        }

        return redirect()->back()->with([
            'message' => __('Frontend/general.something_was_wrong'),
            'alert-type' => 'danger'
        ]);
    }

    public function complete_register()
    {

        $categories = Category::get();

        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();

        return view('dar_al_nuzum.complete_register', compact('categories', 'users'));
    }
    public function contact()
    {
        return view('frontend.contact');
    }


    public function do_contact(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email',
            'mobile'    => 'nullable|numeric',
            'title'     => 'required|min:5',
            'message'   => 'required|min:10',
        ]);
        if ($validation->fails()) {
            toastr()->error(__('Frontend/general.empty_field'), __('Frontend/general.something_was_wrong'));
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $data['name']       = $request->name;
        $data['email']      = $request->email;
        $data['mobile']     = $request->mobile;
        $data['title']      = $request->title;
        $data['message']    = $request->message;
        Contact::create($data);
        toastr()->success(__('Frontend/general.message_sent_successfully'));;

        return redirect()->back();
    }

    public function get_quote(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email',
            'mobile'    => 'nullable|numeric',
            'company_name'     => 'required|min:5',
            'category_id'   => 'required',
        ]);
        if ($validation->fails()) {
            toastr()->error(__('Frontend/general.empty_field'), __('Frontend/general.something_was_wrong'));
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $data['name']       = $request->name;
        $data['email']      = $request->email;
        $data['mobile']     = $request->mobile;
        $data['company_name']      = $request->company_name;
        $data['category_id']    = $request->category_id;

        Quote::create($data);
        toastr()->success(__('Frontend/general.message_sent_successfully'));
        return redirect()->back();
    }

    //about us

    public function about_us()
    {

        return view('dar_al_nuzum.about_us');
    }

    // services frontend

    public function service1()
    {

        return view('dar_al_nuzum.services.service1');
    }
    public function service2()
    {

        return view('dar_al_nuzum.services.service2');
    }
    public function service3()
    {

        return view('dar_al_nuzum.services.service3');
    }
    public function service4()
    {

        return view('dar_al_nuzum.services.service4');
    }
    public function service5()
    {

        return view('dar_al_nuzum.services.service5');
    }
    public function service6()
    {

        return view('dar_al_nuzum.services.service6');
    }
    public function service7()
    {

        return view('dar_al_nuzum.services.service7');
    }
    public function service8()
    {

        return view('dar_al_nuzum.services.service8');
    }
    public function service9()
    {

        return view('dar_al_nuzum.services.service9');
    }
    public function service10()
    {

        return view('dar_al_nuzum.services.service10');
    }
}
