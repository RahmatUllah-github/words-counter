<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteSettingsController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('cache.headers:public;max_age=2628000;etag')->group(function () {

    Route::get('/', [GeneralController::class, 'index'])->name('web');
    Route::view('/contactus', 'contactus')->name('contactus.index');
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::post('/blog/search', [BlogController::class, 'search'])->name('blogs.search');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('/category/{id}/blogs', [BlogController::class, 'categoryBlogs'])->name('category.blogs');
    Route::post('/contactus', [ContactController::class, 'contact'])->name('contactus.save');
});

Auth::routes();

// Route::get('/register', function () {
//     return redirect()->route('login');
// });

// Route::get('/migrate', function () {
//     Artisan::call('migrate:fresh');
//     Artisan::call('optimize:clear');

//     return 'done';
// });

Route::get('/clear', function () {
    Artisan::call('optimize:clear');
    Artisan::call('optimize');

    return 'done';
});

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    // Routes requiring authentication

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/categories', [CategoryController::class, 'adminIndex'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::post('/categories/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');

    Route::get('/blogs', [BlogController::class, 'adminIndex'])->name('blogs.index');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.save');
    Route::get('/blogs/{id}', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::post('/blogs/update', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.delete');

    Route::get('/contact', [ContactController::class, 'adminContact'])->name('contact.index');
    Route::get('/profile', [HomeController::class, 'adminProfile'])->name('profile.index');
    Route::post('/profile', [HomeController::class, 'profileUpdate'])->name('profile.update');
    Route::get('/site-settings', [SiteSettingsController::class, 'adminSiteSettings'])->name('site-settings.index');
    Route::post('/site-settings', [SiteSettingsController::class, 'saveSetting'])->name('site-settings.save');
});
