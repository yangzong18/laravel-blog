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

Route::get('/', function () {
	return redirect('/blog');
});
//Route::get('/test/{name}','TestController@{$name}');
Route::get('test/{id}', function ($id) {
    $Control = new \App\Http\Controllers\TestController();
    return $Control->{$id}();
});
Route::get('/blog','BlogController@index')->name('blog.name');
Route::get('/blog/{slug}','BlogController@showPost')->name('blog.detail');

// 后台路由
Route::get('/admin', function () {
	return redirect('/admin/post');
});

Route::middleware('auth')->namespace('Admin')->group(function (){
	Route::resource('admin/post', 'PostController',['except' => 'show']);
	Route::resource('admin/tag', 'TagController', ['except' => 'show']);
	
	Route::get('admin/upload', 'UploadController@index');
	// 添加如下路由
	Route::post('admin/upload/file', 'UploadController@uploadFile');
	Route::delete('admin/upload/file', 'UploadController@deleteFile');
	Route::post('admin/upload/folder', 'UploadController@createFolder');
	Route::delete('admin/upload/folder', 'UploadController@deleteFolder');
});

Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('/login','Auth\LoginController@login');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('contact', 'ContactController@showForm');
Route::post('contact', 'ContactController@sendContactInfo');

// 添加新的路由
Route::get('rss', 'BlogController@rss');
// 添加新的路由
Route::get('sitemap.xml', 'BlogController@siteMap');



