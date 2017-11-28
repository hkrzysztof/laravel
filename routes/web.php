<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', 'WelcomeController@index');


Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'WelcomeController@post']);

Route::group(['middleware'=>'admin'], function (){
    Route::resource('admin/users', 'AdminUsersController', ['names'=>[
        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit',
        'destroy'=>'admin.users.destroy'
    ]]);
    Route::resource('admin/posts', 'AdminPostsController', ['names'=>[
        'index'=>'admin.posts.index',
        'create'=>'admin.posts.create',
        'store'=>'admin.posts.store',
        'edit'=>'admin.posts.edit',
        'destroy'=>'admin.posts.destroy'
    ]]);
    Route::resource('admin/categories', 'AdminCategoriesController', ['names'=>[
        'index'=>'admin.categories.index',
        'create'=>'admin.categories.create',
        'store'=>'admin.categories.store',
        'edit'=>'admin.categories.edit',
        'destroy'=>'admin.categories.destroy'
    ]]);
    Route::resource('admin/media', 'AdminMediaController', ['names'=>[
        'index'=>'admin.media.index',
        'create'=>'admin.media.create',
        'store'=>'admin.media.store',
        'edit'=>'admin.media.edit',
        'destroy'=>'admin.media.destroy'
    ]]);
    Route::resource('admin/comments', 'PostCommentsController', ['names'=>[
        'index'=>'admin.comments.index',
        'create'=>'admin.comments.create',
        'store'=>'admin.comments.store',
        'edit'=>'admin.comments.edit',
        'destroy'=>'admin.comments.destroy',
        'show'=>'admin.comments.show'
    ]]);
    Route::resource('admin/comments/replies', 'CommentRepliesController', ['names'=>[
        'index'=>'admin.comments.replies.index',
        'create'=>'admin.comments.replies.create',
        'store'=>'admin.comments.replies.store',
        'edit'=>'admin.comments.replies.edit',
        'destroy'=>'admin.comments.replies.destroy',
        'show'=>'admin.comments.replies.show'
    ]]);


    Route::get('/admin', function (){
        return view('admin.index');
    });
});

Route::group(['middleware'=>'auth'], function (){
    Route::post('comment/reply', 'CommentRepliesController@createReply');
});

