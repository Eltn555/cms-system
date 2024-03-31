<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\BlogCategoryController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\ImageController;
use App\Http\Controllers\admin\PartnersController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\TagController;
use App\Http\Livewire\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\front\AboutController;

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
Route::get('/category/{slug}', \App\Http\Livewire\Categories::class)->name('front.category.show');
Route::get('/category', \App\Http\Livewire\Categories::class)->name('front.category.index');
Route::get('/product/{slug}', \App\Http\Livewire\Front\Products::class)->name('front.product.show');
Route::resource('/wishlist',\App\Http\Controllers\front\WishlistController::class, ['as'=>'front']);
Route::resource('/cart',\App\Http\Controllers\front\CartController::class, ['as'=>'front']);
Route::get('/contact', function () { return view('front.contact.index'); })->name('contact.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/blog', Blog::class)->name('blog.index');
Route::get('/blog/{id}', \App\Http\Livewire\BlogDetails::class)->name('blog.details');
Route::group(['prefix' => 'profile'], function () {
    Route::get('/', \App\Http\Livewire\Profile::class)->name('front.profile.index');
});



// ADMIN PANEL
Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'is_admin']], function () {
    Route::get('/', function (){
        return view('dashboard.index');
    });
    // In your web.php or api.php
    Route::resource('/images', ImageController::class, ['as'=>'admin']);
    Route::post('/upload', [CategoriesController::class, 'image'])->name('categories.upload');
    Route::post('/productUpload', [ProductController::class, 'image'])->name('products.upload');
    Route::post('/productUpdate', [ProductController::class, 'ajaxUpdate'])->name('products.update');
    Route::delete('/images', [ImageController::class, 'delete'])->name('image.delete');
    Route::resource('products', ProductController::class, ['as'=>'admin']);
    Route::resource('categories', CategoriesController::class, ['as'=>'admin']);
    Route::resource('tags', TagController::class, ['as'=>'admin']);
    Route::resource('reviews', ReviewController::class, ['as'=>'admin']);
    Route::resource('sliders', SliderController::class, ['as'=>'admin']);
    Route::get('/partners/search', [PartnersController::class, 'search'])->name('admin.partners.search');
    Route::resource('partners', PartnersController::class, ['as'=>'admin']);
    Route::resource('banner', BannerController::class, ['as'=>'admin']);
    Route::group(['prefix'=>'blog'], function () {
        Route::resource('categories', BlogCategoryController::class, ['as'=>'admin.blog']);
    });
    Route::resource('/blog', BlogController::class, ['as'=>'admin']);
    Route::resource('/account', AccountController::class, ['as'=>'admin']);

})->middleware([\App\Http\Middleware\Authenticate::class, \App\Http\Middleware\IsAdmin::class]);
Route::post('/teststore', function (\Illuminate\Http\Request $request){
    $data = $request->all();
    dd($data);
    foreach ($data['filepond'] as $image){

        $path = Storage::put('/images', $image);

        \App\Models\Image::create([
           'alt'=>$path,
            'image'=>$path
        ]);
    }


})->name('test.store');
Route::get('/teststores', function (){

    $category = Category::find(1);
    dump(Product::where('category_id', $category->id)->get());
    $products = Product::where('category_id', $category->id)
        ->whereHas('tags', function ($query) {
            $query->whereIn('tags.id',[1]);
        })
        ->get();
    dd($products);

    $products = Product::all();
    dump($products);
    $categories = Category::all();
    dump($categories);
    $newproducts = $categories[0]->products;
    dump($newproducts);
    $producttags = $newproducts->whereHas('tags', function ($tags) {
        $tags->whereIn('id', [1]);
    })->get();
    dd($producttags);
    $tags = Tag::all();
    dump($tags[0]->products->toArray());
    $id = $categories[0]->id;
    $tagproducts = $tags[0]->products->where(function ($query, $id) {
        $query->category->id = 1;
    });
    dump($tagproducts);






    die();
    return view('test');
})->name('test.stores');

Auth::routes();
