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
//frontend routes
Route::get('/', 'Frontend\HomeController@view')->name('homesite');

//post for frontend
Route::get('post/{postslug}', 'Frontend\PostController@post')->name('post');
    


Route::group(['middleware'=>'admin'],function(){

//admin routes
Route::get('/admin/home', function () {
    return view('admin.home');
});
Route::resource('admin/tags', 'Admin\TagController');
//ceating post admin
Route::resource('admin/posts', 'Admin\PostController');
//ceating post tag 
//routes for admin role
Route::resource('admin/role', 'Admin\RoleController');

//Routes for admin role Permission
Route::resource('admin/permission', 'Admin\PermissionController');


// //routes for post categories 
Route::resource('admin/category', 'Admin\CategoryController');

// //routes for user inside dashboard from superadmin 
Route::resource('admin/users', 'Admin\UserController');



});

	



Auth::routes();

//Admin Auth Route
Route::get('login-admin', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('login-admin', 'Admin\Auth\LoginController@login');

Route::get('/home', 'HomeController@index')->name('home');
