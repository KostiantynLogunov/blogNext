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

Route::match(['get','post'],'/', 'welcomeContrller@index')->name('welcome.index');
Route::get('/article/{id}', 'welcomeContrller@show')->where('id','\d+')->name('welcome.show');
Route::post('/article/{id}', 'welcomeContrller@saveComment')->where('id','\d+')->name('welcome.saveComment');
Route::get('/about', 'welcomeContrller@about')->name('about');
Route::get('/comments', 'welcomeContrller@comments')->name('comments');


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Auth\RegisterController@register');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::get('/confirm/{token}', 'Auth\LoginController@confirmaion')->name('confirm');
    Route::post('ulogin', 'Auth\LoginController@ulogin');
});

Route::group(['middleware'=>'auth'], function () {
    Route::get('/my/account', 'AccountController@index')->name('account');
    Route::get('/logout', function () {
        \Auth::logout();
        return redirect(route('welcome.index'));
    })->name('logout');

    //ADmin
    Route::group(['prefix'=>'admin','middleware'=>'admin'], function () {
        Route::get('/', 'Admin\AccountController@index')->name('admin');

        //ARTICLES
        Route::resource('articles', 'Admin\ArticleController');

//CATEGORY
        Route::get('/categories', 'Admin\CategoriesController@index')->name('categories');

        Route::get('/categories/add', 'Admin\CategoriesController@addCategory')->name('categories.add');
        Route::post('/categories/add', 'Admin\CategoriesController@addRequestCategory');

        Route::get('/categories/edit/{id}', 'Admin\CategoriesController@editCategory')
                ->where('id', '\d+')
                ->name('categories.edit');
        Route::post('/categories/edit/{id}', 'Admin\CategoriesController@editSave')->where('id', '\d+')->name('saveEdit');

        Route::delete('/categories/delete', 'Admin\CategoriesController@deleteCategory')->name('categories.delete');

        //USERS
        ROUTE::get('/users','Admin\UsersController@index')->name('users');
        ROUTE::get('/users/{id}/sendMail','Admin\UsersController@sendMsg')->name('users.sendMsg');
        ROUTE::post('/users/{id}/sendMail','Admin\UsersController@sendMsg')->name('users.sendMsg');
        ROUTE::get('/users/delete','Admin\UsersController@delete')->name('users.delete');


    });
});
