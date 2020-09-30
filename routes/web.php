<?php

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
Route::get('/','HomeController@index')->name('home');


Route::get('/login','AuthController@login')->name('login');
Route::post('/login','AuthController@postLogin')->name('postLogin');


Route::group(['middleware' => ['auth','checkRole:superadmin,admin'],'prefix' => 'dashboard'], function(){
  Route::get('/','UserController@index')->name('index_admin');

  Route::group(['prefix'=>'berita'],function(){
    Route::get('/','PostController@getPosts')->name('getPosts');
    Route::get('/create','PostController@createPost')->name('createPost');
    Route::post('/','PostController@storePost')->name('storePost');
    Route::get('/edit/{id}','PostController@editPost')->name('editPost');
    Route::patch('/','PostController@updatePost')->name('updatePost');
    Route::get('/delete/{id}','PostController@deletePost')->name('deletePost');
  });

  Route::group(['prefix'=>'foto'],function(){
    Route::get('/','GaleriController@getFoto')->name('getFoto');
    Route::post('/','GaleriController@storeFoto')->name('storeFoto');
    Route::get('/delete/{id}','GaleriController@deleteFoto')->name('deleteFoto');
  });

});


Route::get('/home', 'HomeController@index')->name('home');
