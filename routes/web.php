<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!


|'middleware'=>'auth'
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/article','ArticleController@index');
//Route::get('article/create','ArticleController@create');
//Route::get('/article/{id}','ArticleController@show');
//Route::post('article/store','ArticleController@store');






Route::group(['namespace' => 'frontEnd'],function(){
Route::get('/', 'HomeController@index')->name('home');

Route::get('article/{id}', 'HomeController@show')->name('articles.show');
//route tags
Route::get('tag/{tag}','HomeController@tag')->name('tag');
//route category
Route::get('category/{SubCat}','HomeController@category')->name('category');

//route contact form
Route::get('contact','ContactController@index')->name('contact');

Route::post('send','ContactController@send');
Route::get('email','ContactController@email');
//route errore 404
Route::get('pagenotfound','HomeController@pagenotfound')->name('notfound');
});



Route::group(['namespace' => 'backEnd','prefix'=>'admin'],function(){
	
	Route::get('dashboard','HomeController@index')->name('admin.dashboard');
	//route user
	Route::resource('user','UserController');
	Route::get('user/delete/{id}','UserController@destroy')->name('user.delete');

	//route role
	Route::resource('role','RoleController');
	Route::get('role/delete/{id}','RoleController@destroy')->name('role.delete');

	//route role
	Route::resource('permission','PermissionController');
	Route::get('permission/delete/{id}','PermissionController@destroy')->name('permission.delete');

	//route articles
	Route::resource('post','PostController');//,['middleware'=>'auth']);
	Route::get('post/delete/{id}','PostController@destroy')->name('post.delete');

	//route categories
	Route::resource('category','CategoryController');
	Route::get('category/delete/{id}','CategoryController@destroy')->name('category.delete');

	//route sub_categories
	Route::resource('sub_category','SubCategoryController');
	Route::get('sub_category/delete/{id}','SubCategoryController@destroy')->name('sub_category.delete');
	//route articles
	Route::resource('article','ArticleController');
	Route::get('article/delete/{id}','ArticleController@destroy')->name('article.delete');
	//route tag
	Route::resource('tag','TagController');
	Route::get('tag/delete/{id}','TagController@destroy')->name('tag.delete');
	
	
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Auth\LoginController@Login');
});


Auth::routes();
Route::get('/home', 'HomeController@index');
