<?php

use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\PartnersController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\TagController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|f
*/


Route::group(['prefix'=>'/'], function (){
   Route::resource('/',\App\Http\Controllers\front\HomeController::class, ['as'=>'front']);
});


Route::get('/category/search',[\App\Http\Controllers\front\CategoryController::class,'search'])->name('front.category.search');
//Route::get('/{category}', \App\Http\Livewire\CategoryBanner::class);
Route::resource('/category',\App\Http\Controllers\front\CategoryController::class, ['as'=>'front']);
Route::get('/category/{slug}', \App\Http\Livewire\Categories::class)->name('front.category.show');
Route::resource('/wishlist',\App\Http\Controllers\front\WishlistController::class, ['as'=>'front']);
Route::resource('/cart',\App\Http\Controllers\front\CartController::class, ['as'=>'front']);
Route::get('/contact', function () { return view('front.contact.index'); })->name('contact.index');
Route::get('/blog', function () { return view('front.blog.index'); })->name('blog.index');


// ADMIN PANEL
Route::group(['prefix'=>'admin', 'middleware' => 'auth'], function () {
    Route::get('/', function (){
        return view('dashboard.index');
    });
    // In your web.php or api.php
    Route::post('/upload', [CategoriesController::class, 'image'])->name('categories.upload');
    Route::post('/productUpload', [ProductController::class, 'image'])->name('products.upload');
    Route::resource('products', ProductController::class, ['as'=>'admin']);
    Route::resource('categories', CategoriesController::class, ['as'=>'admin']);
    Route::resource('tags', TagController::class, ['as'=>'admin']);
    Route::resource('reviews', ReviewController::class, ['as'=>'admin']);
    Route::resource('sliders', SliderController::class, ['as'=>'admin']);
    Route::get('/partners/search', [PartnersController::class, 'search'])->name('admin.partners.search');
    Route::resource('partners', PartnersController::class, ['as'=>'admin']);
});
Route::post('/teststore', function (\Illuminate\Http\Request $request){
    $data = $request->all();

    foreach ($data['filepond'] as $image){

        $path = Storage::put('/images', $image);

        \App\Models\Image::create([
           'alt'=>$path,
            'image'=>$path
        ]);
    }


})->name('test.store');
Route::get('/teststores', function (){


    $product = Product::find(1);
    dump($product);
    dump($product->images);
    foreach ($product->images as $tag){
        dump($tag);
    }
    die();

    return view('test');
})->name('test.stores');

Auth::routes();
