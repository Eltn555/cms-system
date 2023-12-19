<?php

use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\TagController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::group(['prefix'=>'admin', 'middleware' => 'auth'], function () {
    Route::get('/', function (){
        return view('dashboard.index');
    });
    Route::resource('products', ProductController::class, ['as'=>'admin']);
    Route::resource('categories', CategoriesController::class, ['as'=>'admin']);
    //Route::post('categories/update', 'CategoriesController@update')->name('categories.update');
    Route::resource('tags', TagController::class, ['as'=>'admin']);
});

Auth::routes();
