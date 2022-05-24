<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendHomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['verify'=>true]);
// =================================FrontendHomeController=========start===
Route::get('/',[FrontendHomeController::class,'index'])->name('welcome');
Route::get('/contuck',[FrontendHomeController::class,'contuck'])->name('contack.page');
Route::post('user/information/send',[FrontendHomeController::class,'store'])->name('send.user.information');
Route::get('user/information/view',[FrontendHomeController::class,'view'])->name('user.info.view');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
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





