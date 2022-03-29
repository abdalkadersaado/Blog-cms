<?php

namespace App\Http\Controllers\Frontend;

use toastr;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Service;
use App\Models\Category;
use App\Models\PostMedia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\CompleteRegister;
use App\Http\Traits\imageTrait;
use App\Models\FinancialReport;
use App\Mail\AdminCompleteRegister;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    use imageTrait;

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $posts = auth()->user()->posts()
            ->with(['media', 'category', 'user'])
            ->withCount('comments')->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();
        return view('frontend.users.dashboard', compact('posts'));
    }

    // show info
    public function edit_info()
    {
        return view('frontend.users.edit_info');
    }

    public function edit_information_company()
    {
        return view('frontend.users.information_company');
    }

    public function complete_user_info(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [

            'company_name' => 'required',
            'license_number' => 'required',
            'Commercial_Register' => 'required',
            // 'MOA' => 'required',
            'date_contract' => 'required',
            'contract_pdf' => 'required',
            'passport_number' => 'required',
            'emirates_id' => 'required',
            'expiry_date_passport' => 'required',
            'id_number' => 'required',
            'expiry_date' => 'required',
            // 'user_category_id' => 'required',
        ]);
        if ($validator->fails()) {
            toastr()->error(__('Frontend/general.empty_field'), __('Frontend/general.something_was_wrong'));
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->file('emirates_id')) {

            if (auth()->user()->emirates_id != '') {
                if (File::exists('upload_attachments/' . auth()->user()->id . '/' . 'visa_attachment/' . auth()->user()->emirates_id)) {
                    unlink('upload_attachments/' . auth()->user()->id . '/' . 'visa_attachment/' . auth()->user()->emirates_id);
                }
            }
            $image = $request->file('emirates_id');
            $file_name = $image->getClientOriginalName();

            $imageName = $request->emirates_id->getClientOriginalName();
            $request->emirates_id->move(public_path('upload_attachments/' . auth()->user()->id . '/' . 'visa_attachment'), $imageName);

            $data['emirates_id']  = $file_name;
        }

        $data['id_number']  = $request->id_number;
        $data['expiry_date']  = $request->expiry_date;
        $data['passport_number']  = $request->passport_number;
        $data['expiry_date_passport']  = $request->expiry_date_passport;
        $data['date_contract'] = $request->date_contract;

        if ($request->file('contract_pdf')) {

            if (auth()->user()->contract_pdf != '') {
                if (File::exists('upload_attachments/' . auth()->user()->id . '/' . 'contract/' . auth()->user()->contract_pdf)) {
                    unlink('upload_attachments/' . auth()->user()->id . '/' . 'contract/' . auth()->user()->contract_pdf);
                }
            }

            $image = $request->file('contract_pdf');
            $file_name = $image->getClientOriginalName();
            $imageName = $request->contract_pdf->getClientOriginalName();
            $request->contract_pdf->move(public_path('upload_attachments/' . auth()->user()->id . '/' . 'contract'), $imageName);

            $data['contract_pdf']  = $file_name;
        }

        $data['company_name']  = $request->company_name;
        $data['license_number']  = $request->license_number;

        if ($request->file('Commercial_Register')) {
            if (auth()->user()->Commercial_Register != '') {
                if (File::exists('upload_attachments/' . auth()->user()->id . '/' . 'Commercial_Register/' . auth()->user()->Commercial_Register)) {
                    unlink('upload_attachments/' . auth()->user()->id . '/' . 'Commercial_Register/' . auth()->user()->Commercial_Register);
                }
            }
            $image = $request->file('Commercial_Register');
            $file_name = $image->getClientOriginalName();
            $imageName = $request->Commercial_Register->getClientOriginalName();
            $request->Commercial_Register->move(public_path('upload_attachments/' . auth()->user()->id . '/' . 'Commercial_Register'), $imageName);

            $data['Commercial_Register']  = $file_name;
        }

        if ($request->file('MOA')) {
            if (auth()->user()->MOA != '') {
                if (File::exists('upload_attachments/' . auth()->user()->id . '/' . 'MOA/' . auth()->user()->MOA)) {
                    unlink('upload_attachments/' . auth()->user()->id . '/' . 'MOA/' . auth()->user()->MOA);
                }
            }
            $image = $request->file('MOA');
            $file_name = $image->getClientOriginalName();
            $imageName = $request->MOA->getClientOriginalName();
            $request->MOA->move(public_path('upload_attachments/' . auth()->user()->id . '/' . 'MOA'), $imageName);

            $data['MOA']  = $file_name;
        }

        $data['status_order'] = '1';
        $data['category_id'] = $request->user_category_id;

        $data['name'] = auth()->user()->name;

        $update = auth()->user()->update($data);

        // Mail::to($request->email)->send(new CompleteRegister());

        Mail::to(auth()->user()->email)->send(new CompleteRegister());

        Mail::to('abdalkader1994953@gmail.com')->send(new AdminCompleteRegister($data));

        // save financial Report
        // $user = User::whereId($id)->first();
        // $f = FinancialReport::whereUserId($id)->first();

        // $image = $request->file('financial_report');
        // $file_name = $image->getClientOriginalName();
        // $request->user()->report()->updateOrCreate(['upload_to' => $user->id], [
        //     // $request->user()->report()->create([
        //     //     'upload_to' => $user->id,
        //     'financial' => $file_name,
        //     'user_id' => auth()->user()->id,
        // ]);

        // $imageName = $request->financial_report->getClientOriginalName();
        // $request->financial_report->move(public_path('upload_attachments/' . $user->id . '/' . 'financial_report'), $imageName);

        if ($update) {
            toastr()->success(__('Frontend/general.updated_successfully'));
            return redirect()->route('profile');
        } else {
            toastr()->error(__('Frontend/general.something_was_wrong'));
            return redirect()->back();
        }
    }

    public function edit_profile_user(Request $request)
    {
        $validator = Validator::make($request->all(), [

            // 'company_name' => 'required',
            // 'license_number' => 'required|numeric',
            // 'Commercial_Register' => 'required',
            // 'date_contract' => 'required',
            // 'contract_pdf' => 'required',
            // 'passport_number' => 'required',
            // 'emirates_id' => 'required',
            // 'expiry_date_passport' => 'required',
            // 'id_number' => 'required',
            // 'expiry_date' => 'required',
            // // 'user_category_id' => 'required',
        ]);
        if ($validator->fails()) {
            toastr()->error(__('Frontend/general.empty_field'), __('Frontend/general.something_was_wrong'));
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->file('emirates_id')) {

            if (auth()->user()->emirates_id != '') {
                if (File::exists('upload_attachments/' . auth()->user()->id . '/' . 'visa_attachment/' . auth()->user()->emirates_id)) {
                    unlink('upload_attachments/' . auth()->user()->id . '/' . 'visa_attachment/' . auth()->user()->emirates_id);
                }
            }
            $image = $request->file('emirates_id');
            $file_name = $image->getClientOriginalName();

            $imageName = $request->emirates_id->getClientOriginalName();
            $request->emirates_id->move(public_path('upload_attachments/' . auth()->user()->id . '/' . 'visa_attachment'), $imageName);

            $data['emirates_id']  = $file_name;
        }

        $data['id_number']  = $request->id_number;
        $data['expiry_date']  = $request->expiry_date;
        $data['passport_number']  = $request->passport_number;
        $data['expiry_date_passport']  = $request->expiry_date_passport;
        $data['date_contract'] = $request->date_contract;

        if ($request->file('contract_pdf')) {

            if (auth()->user()->contract_pdf != '') {
                if (File::exists('upload_attachments/' . auth()->user()->id . '/' . 'contract/' . auth()->user()->contract_pdf)) {
                    unlink('upload_attachments/' . auth()->user()->id . '/' . 'contract/' . auth()->user()->contract_pdf);
                }
            }

            $image = $request->file('contract_pdf');
            $file_name = $image->getClientOriginalName();
            $imageName = $request->contract_pdf->getClientOriginalName();
            $request->contract_pdf->move(public_path('upload_attachments/' . auth()->user()->id . '/' . 'contract'), $imageName);

            $data['contract_pdf']  = $file_name;
        }

        $data['company_name']  = $request->company_name;
        $data['license_number']  = $request->license_number;

        if ($request->file('Commercial_Register')) {
            if (auth()->user()->Commercial_Register != '') {
                if (File::exists('upload_attachments/' . auth()->user()->id . '/' . 'Commercial_Register/' . auth()->user()->Commercial_Register)) {
                    unlink('upload_attachments/' . auth()->user()->id . '/' . 'Commercial_Register/' . auth()->user()->Commercial_Register);
                }
            }
            $image = $request->file('Commercial_Register');
            $file_name = $image->getClientOriginalName();
            $imageName = $request->Commercial_Register->getClientOriginalName();
            $request->Commercial_Register->move(public_path('upload_attachments/' . auth()->user()->id . '/' . 'Commercial_Register'), $imageName);

            $data['Commercial_Register']  = $file_name;
        }

        if ($request->file('MOA')) {
            if (auth()->user()->MOA != '') {
                if (File::exists('upload_attachments/' . auth()->user()->id . '/' . 'MOA/' . auth()->user()->MOA)) {
                    unlink('upload_attachments/' . auth()->user()->id . '/' . 'MOA/' . auth()->user()->MOA);
                }
            }
            $image = $request->file('MOA');
            $file_name = $image->getClientOriginalName();
            $imageName = $request->MOA->getClientOriginalName();
            $request->MOA->move(public_path('upload_attachments/' . auth()->user()->id . '/' . 'MOA'), $imageName);

            $data['MOA']  = $file_name;
        }

        $data['status_order'] = '1';
        $data['category_id'] = $request->user_category_id;

        $update = auth()->user()->update($data);

        if ($update) {
            toastr()->success(__('Frontend/general.updated_successfully'));
            return redirect()->back();
        } else {
            toastr()->error(__('Frontend/general.something_was_wrong'));
            return redirect()->back();
        }
    }

    public function update_personal_info(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'email'         => 'required|email',
            'mobile'        => 'required|numeric',
            'bio'           => 'nullable|min:10',
            'receive_email' => 'required',
            // 'user_image'    => 'nullable|image|max:20000,mimes:jpeg,jpg,png',
            // 'company_name' => 'required',
            // 'license_number' => 'required|numeric',
            // 'Commercial_Register' => 'required',
            // 'date_contract' => 'required',
            // 'contract_pdf' => 'required',
            // 'about_company' => 'required',
            // 'about_owner_company' => 'required',
            // 'partners_company' => 'nullable',
            // 'emirates_id' => 'required',
            // 'id_number' => 'nullable',
            // 'expiry_date' => 'nullable',
            // 'passport_image' => 'nullable',
            // 'passport_number' => 'nullable',
            // 'release_date' => 'nullable',
            // 'expiry_date_passport' => 'nullable',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['name']           = $request->name;
        $data['email']          = $request->email;
        $data['mobile']         = $request->mobile;
        $data['bio']            = $request->bio;
        $data['receive_email']  = $request->receive_email;
        if ($image = $request->file('user_image')) {
            if (auth()->user()->user_image != '') {
                if (File::exists('/assets/users/' . auth()->user()->user_image)) {
                    unlink('/assets/users/' . auth()->user()->user_image);
                }
            }
            $filename = Str::slug(auth()->user()->username)  . '.' . $image->getClientOriginalExtension();
            $path = public_path('assets/users/' . $filename);
            Image::make($image->getRealPath())->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);

            $data['user_image'] = $filename;
        }

        if ($image = $request->file('emirates_id')) {
            if (auth()->user()->emirates_id != '') {
                if (File::exists('/assets/users/emirates_ID/' . auth()->user()->emirates_id)) {
                    unlink('/assets/users/' . auth()->user()->emirates_id);
                }
            }
            $filename_emirates_id = Str::slug(auth()->user()->username) . '.' . $image->getClientOriginalExtension();
            $path = public_path('assets/users/emirates_ID/' . $filename_emirates_id);
            Image::make($image->getRealPath())->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);

            $data['emirates_id']  = $filename_emirates_id;
        }

        $data['id_number']  = $request->id_number;
        $data['expiry_date']  = $request->expiry_date;

        if ($image = $request->file('passport_image')) {
            if (auth()->user()->passport_image != '') {
                if (File::exists('/assets/users/passport/' . auth()->user()->passport_image)) {
                    unlink('/assets/users/' . auth()->user()->passport_image);
                }
            }
            $filename_passport_image = Str::slug(auth()->user()->username) . '.' . $image->getClientOriginalExtension();
            $path = public_path('assets/users/passport/' . $filename_passport_image);
            Image::make($image->getRealPath())->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);

            $data['passport_image']  = $filename_passport_image;
        }
        $data['passport_number']  = $request->passport_number;
        $data['release_date']  = $request->release_date;
        $data['expiry_date_passport']  = $request->expiry_date_passport;

        $update = auth()->user()->update($data);

        if ($update) {
            return redirect()->back()->with([
                'message' => __('Frontend/general.updated_successfully'),
                'alert-type' => 'success',
            ]);
        } else {
            return redirect()->back()->with([
                'message' => __('Frontend/general.something_was_wrong'),
                'alert-type' => 'danger',
            ]);
        }
    }


    public function update_info(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'company_name' => 'required',
            'license_number' => 'required|numeric',
            'Commercial_Register' => 'required',
            'date_contract' => 'required',
            'contract_pdf' => 'required',
            'about_company' => 'required',
            'about_owner_company' => 'required',
            'partners_company' => 'nullable',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['company_name']  = $request->company_name;
        $data['license_number']  = $request->license_number;
        $data['Commercial_Register']  = $request->Commercial_Register;

        $data['date_contract']            = $request->date_contract;
        $data['about_company']  = $request->about_company;
        $data['about_owner_company']  = $request->about_owner_company;
        $data['partners_company']  = $request->partners_company;

        if ($image = $request->file('contract_pdf')) {
            if (auth()->user()->contract_pdf != '') {
                if (File::exists('/assets/users/contract_pdf/' . auth()->user()->contract_pdf)) {
                    unlink('/assets/users/' . auth()->user()->contract_pdf);
                }
            }
            $filename_pdf = Str::slug(auth()->user()->username) . '.' . $image->getClientOriginalExtension();
            $path = public_path('assets/users/contract_pdf/' . $filename_pdf);
            Image::make($image->getRealPath())->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);

            $data['contract_pdf']  = $filename_pdf;
        }

        $data['status_order'] = '1';


        $update = auth()->user()->update($data);

        if ($update) {
            toastr()->success(__('Frontend/general.updated_successfully'));
            return redirect()->back();
        } else {
            toastr()->error(__('Frontend/general.something_was_wrong'));
            return redirect()->back();
        }
    }


    public function edit_password()
    {
        $services = Service::get();
        return view('frontend.users.update_password', compact('services'));
    }

    public function update_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password'  => 'required',
            'password'          => 'required|confirmed'
        ]);
        if ($validator->fails()) {
            toastr()->error(__('Frontend/general.something_was_wrong'));
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = auth()->user();
        if (Hash::check($request->current_password, $user->password)) {
            $update = $user->update([
                'password' => bcrypt($request->password),
                'status_password' => '1',
            ]);

            if ($update) {
                toastr()->success(__('Frontend/general.password_updated'));
                return redirect()->route('users.complete_register');
            } else {
                toastr()->error(__('Frontend/general.something_was_wrong'));
                return redirect()->back();
            }
        } else {
            toastr()->error(__('Frontend/general.something_was_wrong'));
            return redirect()->back();
        }
    }

    public function create_post()
    {
        $tags = Tag::select('id', 'name', 'name_en')->get();
        $categories = Category::whereStatus(1)->select('id', 'name', 'name_en')->get();
        return view('frontend.users.create_post', compact('categories', 'tags'));
    }

    public function store_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'         => 'required',
            'description'   => 'required|min:50',
            'title_en'         => 'required',
            'description_en'   => 'required|min:50',
            'status'        => 'required',
            'comment_able'  => 'required',
            'category_id'   => 'required',
            'tags.*'        => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['title']              = $request->title;
        $data['description']        = Purify::clean($request->description);
        $data['title_en']              = $request->title_en;
        $data['description_en']        = Purify::clean($request->description_en);
        $data['status']             = $request->status;
        $data['comment_able']       = $request->comment_able;
        $data['category_id']        = $request->category_id;

        $post = auth()->user()->posts()->create($data);

        if ($request->images && count($request->images) > 0) {
            $i = 1;
            foreach ($request->images as $file) {
                // $filename = $post->slug . '-' . time() . '-' . $i . '.' . $file->getClientOriginalExtension();

                $filename = time() . '-' . $i . '.' . $file->getClientOriginalExtension();
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $path = public_path('assets/posts/' . $filename);
                Image::make($file->getRealPath())->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);

                $post->media()->create([
                    'file_name' => $filename,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                ]);
                $i++;
            }
        }

        if (count($request->tags) > 0) {
            $new_tags = [];
            foreach ($request->tags as $tag) {
                $tag = Tag::firstOrCreate([
                    'id' => $tag
                ], [
                    'name' => $tag
                ]);

                $new_tags[] = $tag->id;
            }
            $post->tags()->sync($new_tags);
        }

        if ($request->status == 1) {
            Cache::forget('recent_posts');
            Cache::forget('global_tags');
        }

        return redirect()->back()->with([
            'message' => __('Frontend/general.post_created'),
            'alert-type' => 'success',
        ]);
    }

    public function edit_post($post_id)
    {
        $post = Post::whereSlug($post_id)->orWhere('id', $post_id)->whereUserId(auth()->id())->first();

        if ($post) {
            $tags = Tag::select('id', 'name', 'name_en')->get();
            $categories = Category::whereStatus(1)->select('id', 'name', 'name_en')->get();
            return view('frontend.users.edit_post', compact('post', 'categories', 'tags'));
        }

        return redirect()->route('frontend.index');
    }

    public function update_post(Request $request, $post_id)
    {
        $validator = Validator::make($request->all(), [
            'title'         => 'required',
            'description'   => 'required|min:50',
            'title_en'         => 'required',
            'description_en'   => 'required|min:50',
            'status'        => 'required',
            'comment_able'  => 'required',
            'category_id'   => 'required',
            'tags.*'        => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $post = Post::whereSlug($post_id)->orWhere('id', $post_id)->whereUserId(auth()->id())->first();

        if ($post) {
            $data['title']              = $request->title;
            $data['slug']              = null;
            $data['description']        = Purify::clean($request->description);
            $data['title_en']              = $request->title_en;
            $data['slug_en']              = null;
            $data['description_en']        = Purify::clean($request->description_en);
            $data['status']             = $request->status;
            $data['comment_able']       = $request->comment_able;
            $data['category_id']        = $request->category_id;

            $post->update($data);

            if ($request->images && count($request->images) > 0) {
                $i = 1;
                foreach ($request->images as $file) {
                    $filename = $post->slug . '-' . time() . '-' . $i . '.' . $file->getClientOriginalExtension();
                    $file_size = $file->getSize();
                    $file_type = $file->getMimeType();
                    $path = public_path('assets/posts/' . $filename);
                    Image::make($file->getRealPath())->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($path, 100);

                    $post->media()->create([
                        'file_name' => $filename,
                        'file_size' => $file_size,
                        'file_type' => $file_type,
                    ]);
                    $i++;
                }
            }

            if (count($request->tags) > 0) {
                $new_tags = [];
                foreach ($request->tags as $tag) {
                    $tag = Tag::firstOrCreate([
                        'id' => $tag
                    ], [
                        'name' => $tag
                    ]);

                    $new_tags[] = $tag->id;
                }
                $post->tags()->sync($new_tags);
            }
            toastr()->success(__('Frontend/general.post_updated'));
            return redirect()->back();
        }
        return redirect()->back()->with([
            'message' => __('Frontend/general.something_was_wrong'),
            'alert-type' => 'danger',
        ]);
    }

    public function destroy_post($post_id)
    {
        $post = Post::whereSlug($post_id)->orWhere('id', $post_id)->whereUserId(auth()->id())->first();

        if ($post) {
            if ($post->media->count() > 0) {
                foreach ($post->media as $media) {
                    if (File::exists('assets/posts/' . $media->file_name)) {
                        unlink('assets/posts/' . $media->file_name);
                    }
                }
            }
            $post->delete();
            toastr()->success(__('Frontend/general.post_deleted'));
            return redirect()->back();
        }

        return redirect()->back()->with([
            'message' => __('Frontend/general.something_was_wrong'),
            'alert-type' => 'danger',
        ]);
    }

    public function destroy_post_media($media_id)
    {
        $media = PostMedia::whereId($media_id)->first();
        if ($media) {
            if (File::exists('assets/posts/' . $media->file_name)) {
                unlink('assets/posts/' . $media->file_name);
            }
            $media->delete();
            return true;
        }
        return false;
    }

    public function show_comments(Request $request)
    {

        $comments = Comment::query();

        if (isset($request->post) && $request->post != '') {
            $comments = $comments->wherePostId($request->post);
        } else {
            $posts_id = auth()->user()->posts->pluck('id')->toArray();
            $comments = $comments->whereIn('post_id', $posts_id);
        }
        $comments = $comments->orderBy('id', 'desc');
        $comments = $comments->paginate(10);

        return view('frontend.users.comments', compact('comments'));
    }

    public function edit_comment($comment_id)
    {
        $comment = Comment::whereId($comment_id)->whereHas('post', function ($query) {
            $query->where('posts.user_id', auth()->id());
        })->first();

        if ($comment) {
            return view('frontend.users.edit_comment', compact('comment'));
        } else {
            toastr()->error(__('Frontend/general.something_was_wrong'));
            return redirect()->back();
        }
    }

    public function update_comment(Request $request, $comment_id)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'email'         => 'required|email',
            'url'           => 'nullable|url',
            'status'        => 'required',
            'comment'       => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $comment = Comment::whereId($comment_id)->whereHas('post', function ($query) {
            $query->where('posts.user_id', auth()->id());
        })->first();

        if ($comment) {
            $data['name']          = $request->name;
            $data['email']         = $request->email;
            $data['url']           = $request->url != '' ? $request->url : null;
            $data['status']        = $request->status;
            $data['comment']       = Purify::clean($request->comment);

            $comment->update($data);

            if ($request->status == 1) {
                Cache::forget('recent_comments');
            }
            toastr()->success(__('Frontend/general.comment_created'));
            return redirect()->back();
        } else {
            return redirect()->back()->with([
                'message' => 'Something was wrong',
                'alert-type' => 'danger',
            ]);
        }
    }

    public function destroy_comment($comment_id)
    {
        $comment = Comment::whereId($comment_id)->whereHas('post', function ($query) {
            $query->where('posts.user_id', auth()->id());
        })->first();

        if ($comment) {
            $comment->delete();

            Cache::forget('recent_comments');
            toastr()->error(__('Frontend/general.comment_deleted'));
            return redirect()->back();
        } else {
            toastr()->error(__('Frontend/general.something_was_wrong'));
            return redirect()->back();
        }
    }
}
