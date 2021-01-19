<?php

use App\Mail\NewUserWelcomeMail;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

//Temporary route to view email template in browser
Route::get('/email', function(){
    return new NewUserWelcomeMail;
});

Route::get('/', 'PostsController@index')->name('');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');

Route::get('/post/create', 'PostsController@create');

Route::post('/post', 'PostsController@store');

Route::get('/post/{post}', 'PostsController@show');

Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');

Route::put('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::post('/follow/{user}', 'FollowsController@store');





