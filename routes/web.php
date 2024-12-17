<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ecomController;

Route::controller(PageController::class)->group(function(){
    Route::get('/','indexPage')->name('index');
    Route::get('/orders','ordersPage')->name('orders');
    Route::get('/products','productsPage')->name('products');
    Route::get('/users','usersPage')->name('users');
    Route::get('/sales','salesPage')->name('sales');
});

Route::controller(OrderController::class)->group(function(){
    Route::get('/vieworder/{order_id}','viewOrder')->name('view.order');
    Route::get('/updateorder/{order_id}','updateOrder')->name('update.order');
    Route::post('/updateorderdb/{order_id}','updateOrderDB')->name('update.order.db');
});

Route::controller(ProductController::class)->group(function(){
    Route::post('/addproductdb','addProductDB')->name('add.product.db');
    Route::get('/addproduct','addProduct')->name('add.product');
    Route::get('/product/{id}','viewProduct')->name('view.product');
    Route::get('/editproduct/{id}','editProduct')->name('edit.product');
    Route::post('/editproductdb/{id}','editProductDB')->name('edit.product.db');
    Route::post('/deleteproduct/{id}','deleteProduct')->name('delete.product');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/viewuser/{id}','viewUser')->name('view.user');
});

Route::controller(SaleController::class)->group(function(){
    Route::get('/productorder/{product_id}','productOrder')->name('product.order');
});
Route::controller(adminController::class)->group(function(){
    Route::get('/admin','adminLogin')->name('admin.login');
    Route::post('/admindb','adminLoginDB')->name('admin.login.db');
    Route::post('/logout','logout')->name('logout');
});

Route::controller(ecomController::class)->group(function(){
    Route::get('/ecom','ecom')->name('ecom');
    Route::get('/ecomview/{id}','ecomView')->name('ecom.view');
    Route::get('/signup','ecomSignup')->name('ecom.signup');
    Route::get('/login','ecomLogin')->name('ecom.login');
    Route::get('/buy/{id}','ecomBuy')->name('ecom.buy');
    Route::post('/buydb/{id}','ecomBuyDB')->name('ecom.buy.db');
    Route::post('/signupdb','ecomSignupDB')->name('ecom.signup.db');
    Route::post('/logindb','ecomLoginDB')->name('ecom.login.db');
    Route::post('/userlogout','ecomLogout')->name('ecom.logout');
    Route::get('/user/{username}','ecomUser')->name('ecom.user');
    Route::post('/userdb/{id}','ecomUserDB')->name('ecom.user.db');
});
