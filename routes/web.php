<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontendHomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocailMediaController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\FrontMatter\FrontMatterParser;

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

Auth::routes(['verify'=>true]);
// =================================FrontendHomeController=========start===
Route::get('/',[FrontendHomeController::class,'index'])->name('welcome');
Route::get('/contuck',[FrontendHomeController::class,'contuck'])->name('contack.page');
Route::post('user/information/send',[FrontendHomeController::class,'store'])->name('send.user.information');
Route::get('user/information/view',[FrontendHomeController::class,'view'])->name('user.info.view');
Route::get('product/show/{slug}',[FrontendHomeController::class,'SlugShow']);
Route::post('subscription',[FrontendHomeController::class,'subscription']);
Route::get('shop',[FrontendHomeController::class,'shop']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('user/info/download/{user_id}',[HomeController::class,'UserInfoDownload']);
// Route::get('/contack', [App\Http\Controllers\HomeController::class, 'contack'])->name('contack');
Route::get('send/Email/all_user',[HomeController::class,'SendMailuser']);
Route::get('add/category',[CategoryController::class,'addcategory'])->name('add/category');
Route::post('category/uploads',[CategoryController::class,'Categoryuploads']);
Route::get('delete/category/{id}',[CategoryController::class,'deletecategory']);
Route::get('edit/category/{id}',[CategoryController::class,'editcategory']);
Route::post('update/category/{id}',[CategoryController::class,'updatecategory']);
Route::get('restore/category/{id}',[CategoryController::class,'restorecategory']);
Route::get('force/delete/category/{id}',[CategoryController::class,'forcedeletecategory']);
Route::post('mark/delete',[CategoryController::class,'markdelete']);


// =================================profile controller========================
Route::get('profile/index',[ProfileController::class, 'profile']);
Route::post('edit/post/name',[ProfileController::class, 'editName']);
Route::post('edit/password',[ProfileController::class, 'chnagepassword']);
Route::post('profile/photo/edit',[ProfileController::class, 'Chnageprofilephoto']);

// =====================product Controller=====================
Route::resource('product',ProductController::class);
Route::get('delete/product',[ProductController::class,'deleteProduct'])->name('product.delete');
Route::get('restore/product/{id}',[ProductController::class,'restoreProduct'])->name('product.restore');
Route::get('forceDelete/product/{id}',[ProductController::class,'ForceDelete'])->name('product.ForceDelete');
// ===================================Banner controller===============
Route::resource('banner',BannerController::class);

// =====================cart controller============
Route::post('cart/store',[CartController::class,'store'])->name('cart.store');
Route::get('cart/page/show',[CartController::class,'cartpageShow'])->name('cart.page.show');
Route::get('cart/page/show/{coupon_name}',[CartController::class,'cartpageShow'])->name('cart.page.show.coupon');
Route::get('remove/product/cart/{id}',[CartController::class,'Remove_product'])->name('remove.product.cart');
Route::post('cart.update',[CartController::class,'update'])->name('cart.update');
// ====================couponController=====================
Route::resource('coupon',CouponController::class);
// /=============================wishlistContrtoller================
Route::post('product/wishlist',[WishlistController::class,'store'])->name('product.wishlist.store');
Route::get('wishlist/page/show',[WishlistController::class,'Wishlist'])->name('wishlist.page.show');
Route::get('wishlsit/remove/{id}',[WishlistController::class,'remove'])->name('wishlist.remove');
// =======================customer Controller======================
Route::get('customer/login',[CustomerController::class,'home'])->name('customer.login');
Route::get('customer/home',[CustomerController::class,'customerHome'])->name('customer.home');
Route::post('customer/detail/store',[CustomerController::class,'store'])->name('customer.store');
Route::get('order/invoice/dowload/{id}',[CustomerController::class,'orderinvoicedowload'])->name('order.invoice.dowload');
// =============================SocailMediaController===================
Route::get('login/github', [SocailMediaController::class, 'redirectToProvider']);
Route::get('login/github/callback', [SocailMediaController::class,'handleProviderCallback']);
// =================================checkoutController=========================
Route::get('checkout/page',[CheckoutController::class,'home'])->name('checkout.page');
Route::post('checkout/store',[CheckoutController::class,'billings'])->name('checkout.store');
Route::post('/district/list/ajax',[CheckoutController::class,'ajaxListdistrict']);
// ================================paymentGetway==================
Route::get('stripe', [StripePaymentController::class, 'stripe']);
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');








