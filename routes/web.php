<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('ping', function () {
    $client = new MailchimpMarketing\ApiClient();
    $client->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us1',
    ]);

    $response = $client->lists->addListMember("aec0c7f8a4", [
        "email_address" => "Lindsey.White93@hotmail.com",
        "status" => "subscribed",
    ]);
    ddd($response);
});

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

//Admin
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin')->name('admin.posts.create');
Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin');

Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin')->name('admin.dashboard');
Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin')->name('admin.posts.edit');
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admin')->name('admin.posts.update');
Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('admin')->name('admin.posts.destroy');
