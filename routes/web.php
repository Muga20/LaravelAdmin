<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ClientController;




Route::get('/', [ClientController::class, 'index'])->name('index');





Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('isLoggedIn');

Route::get('/showCategory', [CategoryController::class, 'showCategory'])->name('showCategory')->middleware('isLoggedIn');
Route::get('/createCategory', [CategoryController::class, 'createCategory'])->name('createCategory')->middleware('isLoggedIn');
Route::get('/editCategory', [CategoryController::class, 'editCategory'])->name('editCategory')->middleware('isLoggedIn');
Route::put('/updateCategory', [CategoryController::class, 'updateCategory'])->name('updateCategory')->middleware('isLoggedIn');
Route::post('/storeCategory', [CategoryController::class, 'storeCategory'])->name('storeCategory')->middleware('isLoggedIn');
Route::delete('deleteCategory/{category}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');




Route::get('/showService', [ServiceController::class, 'showServices'])->name('showServices')->middleware('isLoggedIn');
Route::get('/createService', [ServiceController::class, 'createServices'])->name('createServices')->middleware('isLoggedIn');
Route::get('/editService', [ServiceController::class, 'editServices'])->name('editServices')->middleware('isLoggedIn');
Route::put('/updateService', [ServiceController::class, 'updateServices'])->name('updateServices')->middleware('isLoggedIn');
Route::post('/storeService', [ServiceController::class, 'storeServices'])->name('storeServices')->middleware('isLoggedIn');
Route::delete('deleteService/{service}', [ServiceController::class, 'deleteServices'])->name('deleteServices');




Route::get('/showProduct', [ProductsController::class, 'showProducts'])->name('showProducts')->middleware('isLoggedIn');
Route::get('/createProduct', [ProductsController::class, 'createProducts'])->name('createProducts')->middleware('isLoggedIn');
Route::get('/editProduct', [ProductsController::class, 'editProducts'])->name('editProducts')->middleware('isLoggedIn');
Route::delete('/deleteProduct/{product}', [ProductsController::class, 'deleteProducts'])->name('deleteProducts');
Route::put('/updateProduct', [ProductsController::class, 'updateProducts'])->name('updateProducts')->middleware('isLoggedIn');
Route::post('/storeProduct', [ProductsController::class, 'storeProducts'])->name('storeProducts')->middleware('isLoggedIn');




//Blog Routes
Route::get('/createBlogs', [BlogController::class, 'createBlogs'])->name('createBlogs')->middleware('isLoggedIn')->middleware('isLoggedIn');
Route::post('/storeBlogs', [BlogController::class, 'storeBlogs'])->name('storeBlogs')->middleware('isLoggedIn')->middleware('isLoggedIn');
Route::get('/showBlogs', [BlogController::class, 'showBlogs'])->name('showBlogs')->middleware('isLoggedIn')->middleware('isLoggedIn');
Route::get('/editBlog', [BlogController::class, 'editBlogs'])->name('editBlogs')->middleware('isLoggedIn')->middleware('isLoggedIn');
Route::put('/updateBlog', [BlogController::class, 'updateBlogs'])->name('updateBlogs')->middleware('isLoggedIn')->middleware('isLoggedIn');
Route::delete('/deleteBlog/{blog:slug}', [BlogController::class, 'deleteBlogs'])->name('deleteBlogs')->middleware('isLoggedIn')->middleware('isLoggedIn');
//end Blog Routes




Route::get('/showOrder', [CartController::class, 'showCart'])->name('showCart');
Route::get('/cart-items/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('/removeItem/{id}', [CartController::class, 'removeItem'])->name('remove_item_form_cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/customerOrder', [CartController::class, 'storeOrders'])->name('customer_order');



Route::get('/showMessages', [ContactController::class, 'showMessages'])->name('showMessages')->middleware('isLoggedIn');
Route::post('/storeMessages', [ContactController::class, 'storeMessages'])->name('storeMessages');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::delete('/deleteMessage/{contact}', [ContactController::class, 'deleteMessages'])->name('deleteMessages')->middleware('isLoggedIn');




// Authentication Routes 
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('alreadyLoggedIn');
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('alreadyLoggedIn');
Route::post('/register-user', [AuthController::class, 'registerUser'])->name('registerUser');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('loginUser');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');







