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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact-us', 'ContactsController@index')->name('contact');
Route::post('/contact-us', 'ContactsController@store');

Route::get('/profile/{slug}', [

        'uses' => 'ProfilesController@index',
        'as' => 'profile'
    ]);
Route::get('/show', [

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
});