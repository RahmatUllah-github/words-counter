<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteSettingsController;
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

Route::get('/', function () {
    return view('welcome');
})->name('web');

Route::view('/contactus', 'contactus')->name('contactus.index');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::post('/contactus', [ContactController::class, 'contact'])->name('contactus.save');

Auth::routes();

Route::get('/register', function () {
    return redirect()->route('login');
});

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    // Routes requiring authentication

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/blogs', [BlogController::class, 'adminIndex'])->name('blogs');
    Route::get('/contact', [ContactController::class, 'adminContact'])->name('contact');
    Route::get('/profile', [HomeController::class, 'adminProfile'])->name('profile');
    Route::get('/site-settings', [SiteSettingsController::class, 'adminSiteSettings'])->name('site-settings');

});
