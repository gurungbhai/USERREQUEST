<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
});

Auth::routes(['verify' => true]);

Route::get('/profile', function () {
    // Only verified users may access this route...
})->middleware('verified');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile']);
Route::get('/edit/profile', [App\Http\Controllers\HomeController::class, 'edit_profile']);
Route::post('/profile', [App\Http\Controllers\HomeController::class, 'update_profile']);

// update password
Route::get('/change/password', [App\Http\Controllers\HomeController::class, 'change_password']);
Route::post('/change/password', [App\Http\Controllers\HomeController::class, 'update_password']);

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin'])->group(function(){
        Route::view('/login','admin.login')->name('login');
        Route::Post('/check',[AdminController::class,'check'])->name('check');
    });
    Route::middleware(['auth::admin'])->group(function(){
        Route::view('/home','admin.home')->name('home');
    });
});
