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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    Route::resource('post', 'PostController',['except' => [
        'index', 'show'
    ]]);

    Route::resource('taxonomy', 'TaxonomyController', ['except' => [ 
        'show'
    ]]);

    Route::get('/post', 'PostController@dashboard');

    Route::get('/', 'DashboardController@index');
    
    
});

Route::resource('post', 'PostController', ['except' => [
    'create', 'store', 'update', 'destroy', 'edit'
]]);
Route::resource('taxonomy', 'TaxonomyController', ['only' => [
    'show'
]]);

