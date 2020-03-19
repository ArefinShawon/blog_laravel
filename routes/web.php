<?php

Route::get('/', 'FrontController@index');
Route::get('/front-category/{id}','FrontController@frontcategory')->name('front-category');
Route::get('/blog-post/{id}/{name}','FrontController@frontpost')->name('blog-post');

Auth::routes();
//admin: admin@gmail.com
//password: admin123
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/category', 'CategoryController@index')->name('category');
Route::get('/add-category', 'CategoryController@addCategory')->name('add-category');
Route::post('/save-category', 'CategoryController@saveCategory')->name('save-category');
Route::get('/unpublished-category/{id}', 'CategoryController@unpublishCategory')->name('unpublished-category');
Route::get('/published-category/{id}', 'CategoryController@publishCategory')->name('published-category');
Route::get('/edit-category/{id}', 'CategoryController@editCategory')->name('edit-category');
Route::post('/update-category', 'CategoryController@updateCategory')->name('update-category');
Route::get('/delete-category/{id}', 'CategoryController@deleteCategory')->name('delete-category');

Route::resource('tag', 'TagController');
Route::get('/unpublished-tag/{id}', 'TagController@unpublishTag')->name('unpublished-tag');
Route::get('/published-tag/{id}', 'TagController@publishTag')->name('published-tag');

Route::resource('blog', 'BlogController');
Route::get('/unpublished-blog/{id}', 'BlogController@unpublishBlog')->name('unpublished-blog');
Route::get('/published-blog/{id}', 'BlogController@publishBlog')->name('published-blog');
