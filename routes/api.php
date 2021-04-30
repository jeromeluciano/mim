<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'AuthController@login');
Route::delete('/logout', 'AuthController@logout');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/tweet', 'TweetController@create');
    Route::post('/tweets/{tweet}/like', 'TweetController@like');
    Route::post('/user/avatar', 'AuthController@avatar');
    Route::post('/tweet-video', 'TweetController@videoTweet');
    Route::post('/tweet-image', 'TweetController@imageTweet');
    Route::patch('/tweet/{tweet}/views', 'TweetController@incrementViews');
    Route::delete('/tweet/{tweet}', 'TweetController@destroy');

    Route::post('/tweet/{tweet}/comment', 'CommentController@store');
});
// comments
Route::get('/tweet/{tweet}', 'TweetController@getTweet');
Route::get('/tweet/{tweet}/comments', 'TweetController@comments');

// tweets
Route::get('/tweets', 'TweetController@index');
Route::get('/tweets/trendings', 'TweetController@trendings');

// users
Route::post('/user/search', 'UserController@searchUser');
Route::post('/user/register', 'AuthController@register');
Route::get('/user/{user}', 'AuthController@user');
Route::get('/user/{user}/tweets', 'AuthController@tweets');
