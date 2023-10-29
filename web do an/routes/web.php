<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\FileController;
use App\Helper\CartHelper;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\AdminController;
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



Route::get('/',[HomeController::class,'index'])->name('home.index');

// Dẫn tới trang đăng ký custommer
Route::get('home-register',[HomeController::class,'register'])->name('home.register');
Route::post('home-register',[HomeController::class,'post_register'])->name('home.register');
Route::get('customer-active/{customer}/{token}',[HomeController::class,'actived'])->name('customer.active');

// Dẫn tới trang đăng nhập custommer
Route::get('home-login',[HomeController::class,'login'])->name('home.login');
Route::post('home-login',[HomeController::class,'post_login'])->name('home.login');

// Thoát custommer
Route::get('home-logout',[HomeController::class,'logout'])->name('home.logout');

//Dẫn tới trang Menu
Route::get('menu',[HomeController::class,'getAllProductMenu'])->name('menu');

// Dẫn tới trang About us
Route::get('about',[HomeController::class,'about'])->name('about');

// Dẫn tới trang Team
Route::get('team',[HomeController::class,'team'])->name('team');

// Dẫn tới trang Contact
Route::get('contact',[HomeController::class,'contact'])->name('contact');
Route::post('contact',[HomeController::class,'post_contact'])->name('contact');

// Dẫn tới trang thông tin sản phẩm
Route::get('thongtinsp/{id?}',[HomeController::class,'chitietsp'])->name('thongtinsp');

Route::get('timkiemsp/{key?}',[HomeController::class,'timkiemsp'])->name('timkiemsp');

//Dẫn tới trang thông tin khách hàng
Route::get('thongtinkh/{id?}',[CheckoutController::class,'getOrderByCustomerId'])->name('thongtinkh');
Route::post('thongtinkh/{id?}',[HomeController::class,'update_Profile'])->name('thongtinkh');

//Dẫn tới trang thông tin đơn hàng
Route::get('thongtindh/{id?}',[CheckoutController::class,'getOrderDetailByOrderId'])->name('thongtindh');

//Để đăng nhập vào admin vui lòng http://127.0.0.1:8000/admin/login 
//Admin
Route::group(['prefix' => 'admin','namespace' => 'Admin'],function(){
    
    Route::get('/dashboard',[AdminController::class,'index'])->middleware(['auth'])->name('dashboard');
    require __DIR__.'/auth.php';
    include 'customer.php';
    include 'protype.php';
    include 'product.php';
    Route::get('/file',[FileController::class,'file'])->name('file');
    Route::post('/file',[FileController::class,'upload'])->name('file');
    Route::get('/order',[AdminController::class,'orders'])->name('orders');
    Route::get('/editOrder-{id}',[AdminController::class,'editOrder'])->name('editOrder');
    Route::post('/editOrder-{id}',[AdminController::class,'post_editOrder'])->name('editOrder');
    Route::get('/order-del-{id}',[AdminController::class,'deleteorder'])->name('del_order');
    Route::get('/comment',[AdminController::class,'comments'])->name('comment');
    Route::get('/comment-del-{id}',[AdminController::class,'deletecomment'])->name('del_comment');
    Route::get('orderdetail/{id?}',[AdminController::class,'getOrderDetailByOrderId'])->name('order_detail');
});

//Giỏ hàng
Route::group(['prefix' => 'cart'],function(){
    Route::get('view',[CartController::class,'view'])->name('cart.view');
    Route::get('add/{id}/{quantity?}',[CartController::class,'add'])->name('cart.add');
    Route::get('remove/{id}',[CartController::class,'remove'])->name('cart.remove');
    Route::get('update/{id}/{quantity?}',[CartController::class,'update'])->name('cart.update');
});

//Thanh toán
Route::group(['prefix' => 'checkout'],function(){
    Route::get('view',[CheckoutController::class,'form'])->name('checkout');
    Route::post('view',[CheckoutController::class,'submit_form'])->name('checkout');
});

//Giỏ hàng
Route::group(['prefix' => 'wish'],function(){
    Route::get('view',[HomeController::class,'wishView'])->name('wish.view');
    Route::get('add/{id}',[HomeController::class,'addToWish'])->name('wish.add');
    Route::get('remove/{id}',[HomeController::class,'removeToWish'])->name('wish.remove');
});