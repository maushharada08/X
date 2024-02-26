<?php

use App\Mail\NewUserWelcomeMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/email', function(){
    return new NewUserWelcomeMail();
});

Route::post('follow/{user}', 'FollowsController@store');

Route::get('/search', 'App\Http\Controllers\PostsController@search');
Route::get('/notifications', 'App\Http\Controllers\PostsController@notification');

Route::get('/p/create', 'App\Http\Controllers\PostsController@create');
Route::get('/p/{post}', 'App\Http\Controllers\PostsController@show');
Route::post('/p', 'App\Http\Controllers\PostsController@store');
Route::get('/', 'App\Http\Controllers\PostsController@index');

Route::get('/messages', 'App\Http\Controllers\ChatRoomsController@index');

Route::get('/profile/{user}', 'App\Http\Controllers\ProfilesController@index')->name('profile.index');
Route::get('/profile/{user}/edit', 'App\Http\Controllers\ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'App\Http\Controllers\ProfilesController@update')->name('profile.update');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
