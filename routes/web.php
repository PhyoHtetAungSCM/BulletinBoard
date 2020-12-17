<?php

use Illuminate\Support\Facades\Route;

// For Post Screens
Route::prefix('post')->group(function () {
    Route::get('/post-list', ['uses' => 'PostController@index', 'as' => 'post.index']);

    Route::get('/post-detail', ['uses' => 'PostController@postDetail', 'as' => 'post.detail']);
    
    Route::get('/create-post', ['uses' => 'PostController@getCreatePost', 'as' => 'post.getCreatePost']);
    
    Route::get('/update-post/{id}', ['uses' => 'PostController@getUpdatePost', 'as' => 'post.getUpdatePost']);
    
    Route::get('/upload-post', ['uses' => 'PostController@getUploadPost', 'as' => 'post.getUploadPost']);
    
    Route::post('/post', ['uses' => 'PostController@createPost', 'as' => 'post.createPost']);
    
    Route::post('/post-list', ['uses' => 'PostController@searchPost', 'as' => 'post.searchPost']);

    Route::post('/update-post/{id}', ['uses' => 'PostController@updatePost', 'as' => 'post.updatePost']);
});

Route::prefix('user')->group(function () {
    Route::get('/user-list', [
        'uses' => 'UserController@index',
        'as' => 'user.index'
    ]);

    Route::get('/user-detail', [
        'uses' => 'UserController@userDetail',
        'as' => 'user.detail'
    ]);
    
    Route::get('/create-user', [
        'uses' => 'UserController@getCreateUser',
        'as' => 'user.getCreateUser'
    ]);
    
    Route::get('/update-user', [
        'uses' => 'UserController@getUpdateUser',
        'as' => 'user.getUpdateUser'
    ]);
    
    Route::get('/user-profile', [
        'uses' => 'UserController@getUserProfile',
        'as' => 'user.getUserProfile'
    ]);
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
