<?php

use Illuminate\Support\Facades\Route;

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Authentication Routes...
    Route::get('/', ['uses' => 'PostController@index', 'as' => 'post.index']);

    Route::get('/login', ['uses' => 'Auth\LoginController@showLoginForm', 'as' => 'login']);

    Route::post('login', ['uses' => 'Auth\LoginController@login', 'as' => 'login']);

    Route::post('logout', ['uses' => 'Auth\LoginController@logout', 'as' => 'logout']);

// Registration Routes...
// Route::get('/register', ['uses' => 'Auth\RegisterController@showRegistrationForm', 'as' => 'register']);

// Route::post('register', 'Auth\RegisterController@register');

// For Post Screens...
Route::group(['middleware' => 'auth.basic', 'prefix' => 'post'], function() {
    Route::get('/post_list', ['uses' => 'PostController@index', 'as' => 'post.index']);
    
    Route::get('/create_post', ['uses' => 'PostController@getCreatePost', 'as' => 'post.getCreatePost']);
    
    Route::get('/update_post/{id}', ['uses' => 'PostController@getUpdatePost', 'as' => 'post.getUpdatePost']);
    
    Route::get('/upload_post', ['uses' => 'PostController@getUploadPost', 'as' => 'post.getUploadPost']);
    
    Route::post('/create_post', ['uses' => 'PostController@createPost', 'as' => 'post.createPost']);
    
    Route::post('/post_list', ['uses' => 'PostController@searchPost', 'as' => 'post.searchPost']);

    Route::post('/update_post/{id}', ['uses' => 'PostController@updatePost', 'as' => 'post.updatePost']);

    Route::delete('/post_list', ['uses' => 'PostController@deletePost', 'as' => 'post.deletePost']);
});

// For User Screens...
Route::group(['middleware' => 'auth.basic', 'prefix' => 'user'], function() {
    Route::get('/user_list', ['uses' => 'UserController@index', 'as' => 'user.index']);

    Route::get('/user_profile', ['uses' => 'UserController@getUserProfile', 'as' => 'user.getUserProfile']);

    Route::get('/create_user', ['uses' => 'UserController@getCreateUser', 'as' => 'user.getCreateUser']);
    
    Route::get('/update_user/{id}', ['uses' => 'UserController@getUpdateUser', 'as' => 'user.getUpdateUser']);

    Route::get('/change_password', ['uses' => 'UserController@getChangePassword', 'as' => 'user.getChangePassword']);

    Route::post('/create_user', ['uses' => 'UserController@createUser', 'as' => 'user.createUser']);

    Route::post('/user_list', ['uses' => 'UserController@searchUser', 'as' => 'user.searchUser']);

    Route::delete('/user_list', ['uses' => 'UserController@deleteUser', 'as' => 'user.deleteUser']);
});