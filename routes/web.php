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
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Auth\RegisterController@register');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
});

Route::group(['middleware'=>'auth'], function () {
    Route::get('/my/account', 'AccountController@index')->name('account');
    Route::get('/logout', function () {
        \Auth::logout();
        return redirect(route('login'));
    })->name('logout');

    //ADmin
    Route::group(['middleware'=>'admin'], function () {
        Route::get('/admin', 'Admin\AccountController@index')->name('admin');

        Route::get('/categories', 'Admin\CategoriesController@index')->name('categories');
        Route::get('/categories/add', 'Admin\CategoriesController@addCategory')->name('categories.add');
        Route::get('/categories/edit/{id}', 'Admin\CategoriesController@addCategory')
                ->where('id', '\d+')
                ->name('categories.edit');

        Route::delete('/categories/delete', 'Admin\CategoriesController@deleteCategory')->name('categories.delete');


//        Route::get('/articles', 'Admin\ArticlesController@index')->name('articles');

    });
});
