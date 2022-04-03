<?php

/*===========================================
=            Author: Márcio Renan           =
=            Company: INICIE                =
=            API: GoRest                    =
=            DOC: https://gorest.co.in/     =
=            Copyright (c) 2022             =
===========================================*/

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

Route::get('/', function () {
    return view('welcome');
});

 //------------ USERS SECTION  ------------
Route::get('/users/list', 'UserController@Index')->name('user.list');
Route::get('/users/{id}', 'UserController@Show')->name('user.show');
Route::get('/users/{id}/list_id', 'UserController@ShowId')->name('user.show.id');
Route::get('/sync/user', 'UserController@Syncronize')->name('user.syncronize');
Route::post('/users/store', 'UserController@Store')->name('user.store');
Route::post('/users/delete', 'UserController@Delete')->name('user.delete');
 //------------ USERS SECTION ENDS ------------

 //------------ POSTS SECTION ------------
Route::get('/post/list', 'PostController@Index')->name('post.list');
Route::post('/post/store', 'PostController@Store')->name('post.store');
Route::get('/post/comment/{id}', 'PostController@Comments')->name('post.comment');
 //------------ POSTS SECTION ENDS ------------

 //------------ COMMENTS SECTION  ------------
Route::get('/comments/list', 'CommentController@Index')->name('comment.list');
Route::post('/comment/store', 'CommentController@Store')->name('comment.store');
Route::post('/comment/fisrt/store', 'CommentController@FirstPostStore')->name('comment.first.store');
Route::delete('/comment/{id}', 'CommentController@Delete')->name('comment.delete');
 //------------ COMMENTS SECTION ENDS ------------
