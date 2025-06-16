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
use App\Http\Livewire\Admin\Portfolio\Portfolios;
use App\Http\Livewire\Admin\Portfolio\CategoriesPortfolio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\AboutController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SitemapController;
use App\Http\Livewire\Front\Calculator\Index as CalculatorIndex;
use App\Http\Livewire\Admin\Calculator\Index as CalculatorAdminIndex;
use App\Http\Livewire\Front\Portfolio\PortfoliosView;
use App\Http\Livewire\Front\Portfolio\PortfoliosCollection;
use App\Http\Livewire\Profile;
use App\Http\Livewire\BlogDetails;
use App\Http\Controllers\front\CartController;
use App\Http\Livewire\Front\Cart\CartView;
use App\Http\Livewire\Front\Wishlist\Index as WishlistIndex;
use App\Http\Livewire\Categories;
use App\Http\Livewire\Front\Products;
use App\Http\Controllers\front\CategoryController;
use App\Http\Livewire\Front\Checkout;
use App\Http\Controllers\ProductApi;
use App\Http\Controllers\front\HomeController as FrontHomeController;

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
   Route::resource('/', FrontHomeController::class, ['as'=>'front']);
});
Route::get('/api', [ProductApi::class, 'index']);
Route::post('/payme/prepare', [PaymentController::class, 'handleRequest']);
Route::post('/click/prepare', [PaymentController::class, 'preparePayment']);
Route::post('/click/complete', [PaymentController::class, 'completePayment']);
Route::post('/uzum/check', [PaymentController::class, 'verifyUzumPayment'])->middleware('basic.auth');
Route::post('/uzum/create', [PaymentController::class, 'createUzumPayment'])->middleware('basic.auth');
Route::post('/uzum/confirm', [PaymentController::class, 'confirmUzumPayment'])->middleware('basic.auth');
Route::post('/uzum/status', [PaymentController::class, 'uzumStatus'])->middleware('basic.auth');
Route::post('/uzum/reverse', [PaymentController::class, 'uzumReverse'])->middleware('basic.auth');

Route::get('/generate-sitemap', [SitemapController::class, 'generateSitemap']);
Route::post('/upload-images', [ImageController::class, 'upload'])->name('images.upload');
Route::post('/telegram/webhook', [TelegramController::class, 'webhook']);
Route::get('/category/search',[CategoryController::class,'search'])->name('front.category.search');
Route::get('/category/{slug}', Categories::class)->name('front.category.show');
Route::get('/category', Categories::class)->name('front.category.index');
Route::get('/product/{slug}', Products::class)->name('front.product.show');
Route::get('/calculator', CalculatorIndex::class)->name('front.calculator.index');
Route::get('/wishlist', WishlistIndex::class)->name('front.wishlist.index');
Route::get('/cartItems', CartView::class)->name('front.cartItems.index');
Route::resource('/cart', CartController::class, ['as'=>'front']);
Route::group(['prefix' => '/', 'middleware' => ['front_auth']], function (){
    Route::get('/checkout', Checkout::class)->name('front.checkout.index');
});
Route::get('/contact', function () { return view('front.contact.index'); })->name('contact.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/blog', Blog::class)->name('blog.index');
Route::get('/portfolio', PortfoliosCollection::class)->name('portfolio.index');
Route::get('/blog/{id}', BlogDetails::class)->name('blog.details');
Route::get('/portfolio/{slug}', PortfoliosView::class)->name('portfolio.details');
Route::group(['prefix' => 'profile'], function () {
    Route::get('/', Profile::class)->name('front.profile.index');
    Route::post('/update-profile', [Profile::class, 'update'])->name('updateProfile');
});

Route::post('/upload-video', [ImageController::class, 'video']);
Route::get('/get-video-path', [ImageController::class, 'getVideoPath']);

// ADMIN PANEL
Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'is_admin']], function () {
    Route::get('/', function (){
        return view('dashboard.index');
    });
    Route::resource('/images', ImageController::class, ['as'=>'admin']);
    Route::post('/upload', [CategoriesController::class, 'image'])->name('categories.upload');
    Route::post('/productUpload', [ProductController::class, 'image'])->name('products.upload');
    Route::post('/productUpdate', [ProductController::class, 'ajaxUpdate'])->name('products.update');
    Route::delete('/images', [ImageController::class, 'delete'])->name('image.delete');
    Route::resource('products', ProductController::class, ['as'=>'admin']);
    Route::resource('categories', CategoriesController::class, ['as'=>'admin']);
    Route::resource('tags', TagController::class, ['as'=>'admin']);
    Route::resource('reviews', ReviewController::class, ['as'=>'admin']);
    Route::get('/portfolio', Portfolios::class)->name('admin.portfolio.index');
    Route::get('/portfolio/categories', CategoriesPortfolio::class)->name('admin.portfolioCategories.index');
    Route::resource('sliders', SliderController::class, ['as'=>'admin']);
    Route::get('/partners/search', [PartnersController::class, 'search'])->name('admin.partners.search');
    Route::resource('partners', PartnersController::class, ['as'=>'admin']);
    Route::resource('banner', BannerController::class, ['as'=>'admin']);
    Route::group(['prefix'=>'blog'], function () {
        Route::resource('categories', BlogCategoryController::class, ['as'=>'admin.blog']);
    });
    Route::resource('/blog', BlogController::class, ['as'=>'admin']);
    Route::resource('/account', AccountController::class, ['as'=>'admin']);
    Route::get('/search', [HomeController::class, 'search'])->name('admin.search');
    Route::get('/calculator', CalculatorAdminIndex::class)->name('admin.calculator.index');
})->middleware([\App\Http\Middleware\Authenticate::class, \App\Http\Middleware\IsAdmin::class]);

Auth::routes();
