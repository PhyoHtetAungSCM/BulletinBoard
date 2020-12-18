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

    Route::get('/post-detail', ['uses' => 'PostController@postDetail', 'as' => 'post.detail']);
    
    Route::get('/create-post', ['uses' => 'PostController@getCreatePost', 'as' => 'post.getCreatePost']);
    
    Route::get('/update-post/{id}', ['uses' => 'PostController@getUpdatePost', 'as' => 'post.getUpdatePost']);
    
    Route::get('/upload-post', ['uses' => 'PostController@getUploadPost', 'as' => 'post.getUploadPost']);
    
    Route::post('/create-post', ['uses' => 'PostController@createPost', 'as' => 'post.createPost']);
    
    Route::post('/post-list', ['uses' => 'PostController@searchPost', 'as' => 'post.searchPost']);

    Route::post('/update-post/{id}', ['uses' => 'PostController@updatePost', 'as' => 'post.updatePost']);

    Route::delete('/post-list', ['uses' => 'PostController@deletePost', 'as' => 'post.deletePost']);
});

Route::prefix('user')->group(function () {
    Route::get('/user-detail', ['uses' => 'UserController@index', 'as' => 'user.index']);

    Route::get('/create-user', ['uses' => 'UserController@getCreateUser', 'as' => 'post.getCreateUser']);
    
    Route::get('/update-user', [
        'uses' => 'UserController@getUpdateUser',
        'as' => 'user.getUpdateUser'
    ]);
    
    Route::get('/user-profile', [
        'uses' => 'UserController@getUserProfile',
        'as' => 'user.getUserProfile'
    ]);

    Route::post('/user', ['uses' => 'UserController@createUser', 'as' => 'user.createUser']);
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');