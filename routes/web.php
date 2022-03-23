<?php


use App\Models\Post;
use App\Models\User;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Backend\PostsController;
use App\Http\Controllers\Backend\QuoteController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Api\Users\UsersController;
use App\Http\Controllers\FinancialReportController;
use App\Http\Controllers\Backend\PostTagsController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\ContactUsController;
use App\Http\Controllers\Backend\PermissionsController;
use App\Http\Controllers\Backend\SupervisorsController;
use App\Http\Controllers\Backend\PostCommentsController;
use App\Http\Controllers\Backend\PostCategoriesController;
use App\Http\Controllers\Frontend\Auth\RegisterController;
use App\Http\Controllers\Frontend\Auth\VerificationController;
use App\Http\Controllers\Frontend\Auth\ResetPasswordController;
use App\Http\Controllers\Frontend\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\UsersController as BackendUsersController;
use App\Http\Controllers\Frontend\UsersController as FrontendUsersController;
use App\Http\Controllers\Backend\Auth\LoginController as BackendLoginController;
use App\Http\Controllers\Frontend\Auth\LoginController as FrontendLoginController;
use App\Http\Controllers\Backend\NotificationsController as BackendNotificationsController;
use App\Http\Controllers\Frontend\NotificationsController as FrontendNotificationsController;




Route::get('dar-alnuzum', function () {
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

    $services = Service::Selection()->latest()->paginate(10);
    return view('dar_al_nuzum.index', compact('posts', 'services'));
});

Route::get('/', function () {

    $user = auth()->user();
    if ($user && $user->category_id != null) {

        $posts = Post::with(['media', 'user', 'tags'])
            ->whereCategoryId($user->category_id)
            ->post()
            ->active()
            ->orderBy('id', 'desc')
            ->get();
        // ->withQueryString();

        $posts_by_category_id = Post::with(['media', 'user', 'tags'])
            ->whereCategoryId($user->category_id)
            ->post()
            ->active()
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->withQueryString();

        $users = User::whereHas('roles', function ($query) use ($user) {
            $query->where('name', 'user')->where('client_top', 1)->where('category_id', $user->category_id);
        })->orderBy('sequential_order', 'asc')->get();

        $categories = Category::get();
        return view('dar_al_nuzum.index1', compact('posts', 'categories', 'users', 'user', 'posts_by_category_id'));
    } else {
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
            ->get();
        // ->withQueryString();

        $posts_by_category_id = Post::with(['media', 'user', 'tags'])
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
        $categories = Category::get();

        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'user')->where('client_top', 1);
        })->orderBy('sequential_order', 'asc')->get();

        return view('dar_al_nuzum.index1', compact('posts', 'categories', 'users', 'user', 'posts_by_category_id'));
    }
})->name('dar.home');
####################
// filter by category and top client
Route::get('/filter-categories/{category_slug}', [IndexController::class, 'filterBy_category'])->name('frontend.filter_category');
#####################
Route::get('dar-alnuzum/contact', function () {
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

    $categories = Category::get();

    $users = User::whereHas('roles', function ($query) {
        $query->where('name', 'user');
    })->get();
    return view('dar_al_nuzum.contact_us_show', compact('posts', 'categories', 'users'));
})->name('dar.contact');

Route::get('dar2/login', function () {


    $categories = Category::get();

    $users = User::whereHas('roles', function ($query) {
        $query->where('name', 'user');
    })->get();

    return view('dar_al_nuzum.login', compact('categories', 'users'));
});
########################

Route::get('about-us', [IndexController::class, 'about_us'])->name('about.us');
#####################
################ services
Route::get('/service1', [IndexController::class, 'service1'])->name('service1');
Route::get('/service2', [IndexController::class, 'service2'])->name('service2');
Route::get('/service3', [IndexController::class, 'service3'])->name('service3');
Route::get('/service4', [IndexController::class, 'service4'])->name('service4');
Route::get('/service5', [IndexController::class, 'service5'])->name('service5');
Route::get('/service6', [IndexController::class, 'service6'])->name('service6');
Route::get('/service7', [IndexController::class, 'service7'])->name('service7');
Route::get('/service8', [IndexController::class, 'service8'])->name('service8');
Route::get('/service9', [IndexController::class, 'service9'])->name('service9');
Route::get('/service10', [IndexController::class, 'service10'])->name('service10');
##################
#####################################################################################

//Route test multi partner

Route::get('test', function () {
    $categories = Category::get();
    return view('dar_al_nuzum.test', compact('categories'));
})->name('dar.test');

Route::post('test-post', function (Request $request) {


    $List_Classes = $request->List_Classes;

    try {

        foreach ($List_Classes as $List_Class) {

            $My_partner = new Partner();
            $My_partner->passport_number = $List_Class['passport_number'];
            $My_partner->expiry_date_passport = $List_Class['expiry_date_passport'];
            $My_partner->id_number = $List_Class['id_number'];
            $My_partner->expiry_date = $List_Class['expiry_date'];
            $My_partner->emirates_id = $List_Class['emirates_id'];
            $My_partner->user_id = auth()->user()->id;

            $My_partner->save();
        }

        return redirect()->route('dar.test');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
})->name('dar.test.post');

#####################################################################################
//contact
Route::post('/contact-us', [IndexController::class, 'do_contact'])->name('frontend.do_contact');
// sent quote from guest user
Route::post('/get-quote', [IndexController::class, 'get_quote'])->name('get_quote');

Route::group(['middleware' => 'web'], function () {
    // Route::get('/', [IndexController::class, 'index'])->name('frontend.index');
    Route::get('/website-old', [IndexController::class, 'index'])->name('frontend.index');

    Route::get('js/lang_ar.js', [ServiceController::class, 'vue_translate_ar'])->name('vue_translate_ar');
    Route::get('js/lang_en.js', [ServiceController::class, 'vue_translate_en'])->name('vue_translate_en');

    // Authentication Routes...
    Route::get('/login', [FrontendLoginController::class, 'showLoginForm'])->name('frontend.show_login_form');
    Route::post('login', [FrontendLoginController::class, 'login'])->name('frontend.login');
    Route::get('login/{provider}', [FrontendLoginController::class, 'redirectToProvider'])->name('frontend.social_login');
    Route::get('login/{provider}/callback', [FrontendLoginController::class, 'handleProviderCallback'])->name('frontend.social_login_callback');
    Route::post('logout', [FrontendLoginController::class, 'logout'])->name('frontend.logout');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('frontend.show_register_form');
    Route::post('register', [RegisterController::class, 'register'])->name('frontend.register');
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
    Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
    Route::get('/change-language/{locale}', [ServiceController::class, 'change_language'])->name('change_locale');

    Route::group(['middleware' => 'verified', 'as' => 'users.'], function () {

        //edit and update password
        Route::get('/edit-password', [FrontendUsersController::class, 'edit_password'])->name('edit_password');
        Route::post('/edit-password', [FrontendUsersController::class, 'update_password'])->name('update_password');
        //complete register
        Route::get('complete-register', [IndexController::class, 'complete_register'])->name('complete_register');

        Route::get('/user/notifications/get',  [FrontendNotificationsController::class, 'getNotifications']);
        Route::get('/dashboard', [FrontendUsersController::class, 'index'])->name('dashboard');
        Route::post('/user/notifications/read', [FrontendNotificationsController::class, 'markAsRead']);

        Route::get('/edit-info', [FrontendUsersController::class, 'edit_info'])->name('edit_info');
        Route::post('/update-info', [FrontendUsersController::class, 'update_info'])->name('update_info');
        //complete user info
        Route::post('/complete-user-info/{id}', [FrontendUsersController::class, 'complete_user_info'])->name('complete_user_info');

        Route::post('/edit-info', [FrontendUsersController::class, 'update_personal_info'])->name('update_personal_info');




        Route::get('/edit-information-company', [FrontendUsersController::class, 'edit_information_company'])->name('edit_information_company');



        Route::get('/create-post', [FrontendUsersController::class, 'create_post'])->name('post.create');
        Route::post('/create-post', [FrontendUsersController::class, 'store_post'])->name('post.store');
        Route::get('/edit-post/{post_id}', [FrontendUsersController::class, 'edit_post'])->name('post.edit');
        Route::put('/edit-post/{post_id}', [FrontendUsersController::class, 'update_post'])->name('post.update');
        Route::delete('/delete-post/{post_id}', [FrontendUsersController::class, 'destroy_post'])->name('post.destroy');
        Route::post('/delete-post-media/{media_id}', [FrontendUsersController::class, 'destroy_post_media'])->name('post.media.destroy');
        Route::get('/comments', [FrontendUsersController::class, 'show_comments'])->name('comments');
        Route::get('/edit-comment/{comment_id}', [FrontendUsersController::class, 'edit_comment'])->name('comment.edit');
        Route::put('/edit-comment/{comment_id}', [FrontendUsersController::class, 'update_comment'])->name('comment.update');
        Route::delete('/delete-comment/{comment_id}', [FrontendUsersController::class, 'destroy_comment'])->name('comment.destroy');


        //comment on financial report
        Route::get('financial-report-show', [FinancialReportController::class, 'financial_report'])->name('financial_report');
        // financial report upload from admin or editor
        Route::post('/financial/{id}', [FinancialReportController::class, 'store'])->name('financial.store');
        //show pdf in financial report
        Route::get('View_file/{user_id}/{file_name}', [FinancialReportController::class, 'open_file']);
        // download PDF
        Route::get('download/{user_id}/{file_name}', [FinancialReportController::class, 'get_file']);
        //delete pdf
        Route::delete('delete_file/{id}', [FinancialReportController::class, 'destroy'])->name('delete_file');
        // show comment on financial report
        Route::get('comment-on/{id}', [FinancialReportController::class, 'show_financial_report'])->name('show_financial_report');

        // comment from client on  financial report
        Route::post('/comment', [FinancialReportController::class, 'store_report_comment'])->name('frontend.store_report_comment');
    });
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Authentication Routes...
    Route::get('/login', [BackendLoginController::class, 'showLoginForm'])->name('show_login_form');
    Route::post('login', [BackendLoginController::class, 'login'])->name('login');
    Route::post('logout', [BackendLoginController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['roles', 'role:admin|editor']], function () {
        Route::any('/notifications/get', [BackendNotificationsController::class, 'getNotifications']);
        Route::any('/notifications/read', [BackendNotificationsController::class, 'markAsRead']);
        Route::get('/', [AdminController::class, 'index'])->name('index_route');
        Route::get('/index', [AdminController::class, 'index'])->name('index');
        Route::post('/posts/removeImage/{media_id}', [PostsController::class, 'removeImage'])->name('posts.media.destroy');
        Route::resource('posts', PostsController::class);
        Route::post('/pages/removeImage/{media_id}', [PagesController::class, 'removeImage'])->name('pages.media.destroy');
        Route::resource('pages', PagesController::class);
        Route::resource('post_comments',  PostCommentsController::class);
        Route::resource('post_categories', PostCategoriesController::class);
        Route::resource('post_tags', PostTagsController::class);
        Route::resource('contact_us', ContactUsController::class);
        Route::resource('Quote', QuoteController::class);
        Route::post('/users/removeImage', [BackendUsersController::class, 'removeImage'])->name('users.remove_image');
        Route::resource('users',  BackendUsersController::class);

        Route::get('/show/user-status-order/{id}', [BackendUsersController::class, 'show_order'])->name('show_order');
        Route::get('users_editor', [BackendUsersController::class, 'get_users_editor'])->name('users_editor.index');
        Route::get('change-status',  [BackendUsersController::class, 'status_orders'])->name('change-status');

        //comment financial report
        Route::get('comment-on/{id}', [FinancialReportController::class, 'show_financial_report'])->name('show_financial_report');



        Route::post('users/under_processing/{id}', [BackendUsersController::class, 'order_under_processing'])->name('order.under_processing');
        Route::post('user1/accepted/{id}', [BackendUsersController::class, 'order_accepted'])->name('order.accepted');

        Route::post('/supervisors/removeImage', [SupervisorsController::class, 'removeImage'])->name('supervisors.remove_image');
        Route::resource('supervisors', SupervisorsController::class);
        Route::resource('settings', SettingsController::class);

        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });
});

Route::get('/contact-us', [IndexController::class, 'contact'])->name('frontend.contact');



Route::post('auditor/comment/{id}', [FinancialReportController::class, 'store_comment'])->name('financial.store_comment');

Route::get('/category/{category_slug}', [IndexController::class, 'category'])->name('frontend.category.posts');
Route::get('/tag/{tag_slug}', [IndexController::class, 'tag'])->name('frontend.tag.posts');
Route::get('/archive/{date}', [IndexController::class, 'archive'])->name('frontend.archive.posts');
Route::get('/author/{username}', [IndexController::class, 'author'])->name('frontend.author.posts');
Route::get('/search', [IndexController::class, 'search'])->name('frontend.search');
Route::get('/{post}', [IndexController::class, 'post_show'])->name('frontend.posts.show');
Route::post('/{post}', [IndexController::class, 'store_comment'])->name('frontend.posts.add_comment');
