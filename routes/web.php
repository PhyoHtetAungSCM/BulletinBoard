<?php

use Illuminate\Support\Facades\Route;

// Authentication Routes...
    Route::get('/', ['uses' => 'Auth\LoginController@showLoginForm', 'as' => 'getLogin']);

    Route::post('login', ['uses' => 'Auth\LoginController@login', 'as' => 'login']);

    Route::post('logout', ['uses' => 'Auth\LoginController@logout', 'as' => 'logout']);

// Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

    Route::post('register', 'Auth\RegisterController@register');

// For Post Screens
Route::prefix('post')->group(function () {
    Route::get('/post-list', ['uses' => 'PostController@index', 'as' => 'post.index']);

    // Route::get('/post-detail', ['uses' => 'PostController@postDetail', 'as' => 'post.detail']);
    
    Route::get('/create-post', ['uses' => 'PostController@getCreatePost', 'as' => 'post.getCreatePost']);
    
    Route::get('/update-post/{id}', ['uses' => 'PostController@getUpdatePost', 'as' => 'post.getUpdatePost']);
    
    Route::get('/upload-post', ['uses' => 'PostController@getUploadPost', 'as' => 'post.getUploadPost']);
    
    Route::post('/create-post', ['uses' => 'PostController@createPost', 'as' => 'post.createPost']);
    
    Route::post('/post-list', ['uses' => 'PostController@searchPost', 'as' => 'post.searchPost']);

    Route::post('/update-post/{id}', ['uses' => 'PostController@updatePost', 'as' => 'post.updatePost']);

    Route::delete('/post-list', ['uses' => 'PostController@deletePost', 'as' => 'post.deletePost']);
});

Route::prefix('user')->group(function () {
    Route::get('/user-list', ['uses' => 'UserController@index', 'as' => 'user.index']);

    Route::get('/create-user', ['uses' => 'UserController@getCreateUser', 'as' => 'user.getCreateUser']);
    
    Route::get('/user-profile', ['uses' => 'UserController@getUserProfile', 'as' => 'user.getUserProfile']);

    Route::get('/update-user/{id}', ['uses' => 'UserController@getUpdateUser', 'as' => 'user.getUpdateUser']);

    Route::get('/change-password', ['uses' => 'UserController@getChangePassword', 'as' => 'user.getChangePassword']);

    Route::post('/user', ['uses' => 'UserController@createUser', 'as' => 'user.createUser']);

    Route::post('/user-list', ['uses' => 'UserController@searchUser', 'as' => 'user.searchUser']);

    Route::delete('/user-list', ['uses' => 'UserController@deleteUser', 'as' => 'user.deleteUser']);
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');