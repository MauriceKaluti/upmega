<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UpmegaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MpesaController;
use App\Http\Controllers\ProductGroupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\CartController;
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

Route::get('/cache', function() {
Artisan::call('route:cache');
Artisan::call('config:cache');
Artisan::call('view:cache');
Artisan::call('event:clear');
Artisan::call('optimize');
return "Cached!";
});
 
Route::get('/clear', function() {
Artisan::call('cache:clear');
Artisan::call('view:clear');
Artisan::call('route:clear');
Artisan::call('clear-compiled');
Artisan::call('config:cache');
return "Cleared!";
});
 

Auth::routes();

Route::get('/triggerSTK', [UpmegaController::class, 'triggerSTK'])->name( 'triggerSTK' ); 
Route::post('/stkPush', [UpmegaController::class, 'stkPush'])->name( 'stkPush' ); 
Route::get('/triggerPush', [UpmegaController::class, 'triggerPush'])->name( 'triggerPush' ); 
 
Route::get('/live_search/users', [UpmegaController::class, 'searchUsers'])->name( 'live_search.users' ); 
 
Route::get('/p/{slug}',[UpmegaController::class, 'userProfile'])->name('user.profile');
 
Route::get('/appexit',[UserController::class, 'logout'])->name('appexit');

Route::post('token',[MpesaController::class, 'generateAccessToken'])->name('token');
Route::post('pay',[MpesaController::class, 'stkPushRequest'])->name('payexpress'); 
Route::post('register_url',[MpesaController::class, 'mpesaRegisterUrls'])->name('register_url'); 

Route::post('email-validate',[UpmegaController::class, 'checkEmail'])->name('checkEmail'); 
Route::post('slug-validate',[UpmegaController::class, 'checkUserslug'])->name('checkUserslug'); 
 
Route::get('shop',[UpmegaController::class, 'shopPage'])->name('shop');
Route::get('about',[UpmegaController::class, 'aboutPage'])->name('about');
Route::get('tos',[UpmegaController::class, 'tosPage'])->name('tos');
Route::get('demo',[UpmegaController::class, 'demoPage'])->name('demo');
Route::get('contact',[UpmegaController::class, 'contactPage'])->name('contact');
Route::get('/',[UpmegaController::class, 'homePage'])->name('homepage');
Route::get('/home',[UpmegaController::class, 'homePage'])->name('home');
Route::get('/home2',[UpmegaController::class, 'homePage'])->name('home2');
Route::get('/sync',[UpmegaController::class, 'syncPermissions'])->name('sync');
Route::post('/fill_cart', [CartController::class, 'fillCart'])->name( 'fill_cart' ); 
Route::post('/fill_wishlist', [CartController::class, 'fillWishList'])->name( 'fill_wishlist' ); 
Route::get('/product/{slug}',[ProductController::class, 'productPage'])->name('one.product');
Route::get('/category/{slug}',[CategoryController::class, 'categoryPage'])->name('one.category');
Route::get('/subcategory/{slug}',[SubCategoryController::class, 'subcategoryPage'])->name('one.subcategory');
 Route::any('/cart/add-item/{id}',[CartController::class, 'addItem'])->name('cart.addItem');
 

Route::group(['middleware' => ['auth']], function() {
  Route::resource('cart', CartController::class);


  Route::resource('roles', RoleController::class);
  Route::resource('mpesa_transactions', MpesaController::class);
  Route::resource('users', UserController::class);

    Route::resource('product-group', ProductGroupController::class);
  Route::resource('products', ProductController::class);
  Route::resource('categories', CategoryController::class);
  Route::resource('subcategories', SubCategoryController::class);
    
 Route::post('/fill_wishlist', [CartController::class, 'fillWishList'])->name( 'fill_wishlist' ); 
 
Route::get('/add_product_images/{id}',[ProductController::class, 'addProductImages'])->name('addProductImages');
Route::post('store_product_images',[ProductController::class, 'storeProductImages'])->name('storeProductImages');
Route::any('delete_product_image/{id}',[ProductController::class, 'deleteProductImage'])->name('deleteProductImage');

Route::any('update-myprofile/{id}',[UserController::class, 'updateProfile'])->name('updateProfile');

Route::any('update-customer',[UserController::class, 'updateCustomerAccount'])->name('updateCustomerAccount');

Route::get('upmegausers',[UpmegaController::class, 'upmegausers'])->name('upmega.users');
 
Route::get('/me',[UpmegaController::class, 'myProfile'])->name('my.profile');

// end resources
 
Route::get('dashboard',[UpmegaController::class, 'dashboardPage'])->name('dashboard');
Route::get('account',[UpmegaController::class, 'accountPage'])->name('account');
Route::any('save-contact',[UpmegaController::class, 'storeContact'])->name('storeContact');
Route::any('save-profile',[UpmegaController::class, 'storeProfile'])->name('storeProfile');
   Route::resource('reviews', ProductReviewController::class);

});

 // activate member
Route::get('activateUser',[AdminController::class, 'activateUser'])->name('activateUser');