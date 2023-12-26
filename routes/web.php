<?php

use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ReviewController;
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


Route::group(['prefix'=>'/'], function (){
   Route::resource('/',\App\Http\Controllers\front\HomeController::class, ['as'=>'front']);
})->name('home.index');



Route::get('/category', function () { return view('front.category.index'); })->name('category.index');
Route::get('/contact', function () { return view('front.contact.index'); })->name('contact.index');
Route::get('/blog', function () { return view('front.blog.index'); })->name('blog.index');

Route::group(['prefix'=>'admin', 'middleware' => 'auth'], function () {
    Route::get('/', function (){
        return view('dashboard.index');
    });
    Route::post('/upload', 'CategoriesController@image')->name('categories.upload');
    // In your web.php or api.php
    Route::resource('products', ProductController::class, ['as'=>'admin']);
    Route::resource('categories', CategoriesController::class, ['as'=>'admin']);
    //Route::post('categories/update', 'CategoriesController@update')->name('categories.update');
    Route::resource('tags', TagController::class, ['as'=>'admin']);
    Route::resource('reviews', ReviewController::class, ['as'=>'admin']);
});


Auth::routes();
