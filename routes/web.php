<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('product', [  
        'uses' => 'ProductController@index',  
        'as' => 'product.index'
    ]);
        
    Route::post('product', [  
        'uses' => 'ProductController@create',  
        'as' => 'product.create' 
    ]);

    Route::get('product/{id}', [  
        'uses' => 'ProductController@show',  
        'as' => 'product.show' 
    ]);

    Route::get('product/{id}/edit', [  
        'uses' => 'ProductController@edit',  
        'as' => 'product.edit' 
    ]);

    Route::put('product/{id}', [  
        'uses' => 'ProductController@update',  
        'as' => 'product.update'
    ]);

    Route::delete('product/{id}', [
        'uses' => 'ProductController@destroy',
        'as' => 'product.destroy'
    ]);
});