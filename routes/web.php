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
})->name('main');
Auth::routes();

Route::get('/admin', 'AdminsController@index')->name('admin');
Route::post('/admin-login', 'AdminsController@login')->name('admin-login');
Route::get('/admin/edit/{id}', 'AdminsController@edit')->name('admin/edit');
Route::get('/admin/delete/{id}', 'AdminsController@delete')->name('admin/delete');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact-us', 'ContactsController@index')->name('contact');
Route::post('/contact-us', 'ContactsController@store');
Route::get('/users', 'UsersController@index')->name('users');
Route::get('/profile/{slug}', [

        'uses' => 'ProfilesController@index',
        'as' => 'profile'
    ]);
Route::get('/show/{slug}', [

        'uses' => 'PortfoliosController@show',
        'as' => 'show'
    ]);

Route::group(['middleware'=>'auth'], function(){


    Route::get('/profile/edit/profile', [

        'uses' => 'ProfilesController@edit',
        'as' => 'profile.edit',
    ]);

     Route::post('/profile/update/update', [

        'uses' => 'ProfilesController@update',
        'as' => 'profile.update',
    ]);

    Route::get('/portfolio', [

        'uses' => 'PortfoliosController@index',
        'as' => 'portfolio',
    ]);

    Route::post('/portfolio/create', [

        'uses' => 'PortfoliosController@store',
        'as' => 'portfolio.store',
    ]);
    
    Route::get('/portfolio/edit/{id}', [

        'uses' => 'PortfoliosController@edit',
        'as' => 'portfolio.edit',
    ]);

     Route::get('/portfolio/update/{id}', [

        'uses' => 'PortfoliosController@update',
        'as' => 'portfolio.update',
    ]);
    
     Route::get('/portfolio/delete/{id}', [

        'uses' => 'PortfoliosController@delete',
        'as' => 'portfolio.delete',
    ]);
});