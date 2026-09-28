<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\PostController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// 1. หน้ารวมบทความทั้งหมด (Blog Index)
Route::get('/blog', [PostController::class, 'index'])->name('posts.index');

// 2. หน้าอ่านบทความ (Single Post)
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

// 3. หน้าแสดงผลตามหมวดหมู่
Route::get('/category/{postCategory:slug}', [PostController::class, 'showByCategory'])->name('posts.category');

// 4. หน้าแสดงผลตามแท็ก
Route::get('/tag/{tag:slug}', [PostController::class, 'showByTag'])->name('posts.tag');
Route::middleware('auth:customer')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

    Route::get('/order-history', [\App\Http\Controllers\OrderHistoryController::class, 'history'])->name('order.history');
});

Route::post('/logout2', [ProfileController::class, 'logout'])->name('logout2');

Route::post('products/{product}/reviews', [ReviewController::class, 'store'])->name('review.submit')->middleware('auth:customer');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/term-of-use', function () {
    return view('term');
})->name('term');

Route::get('/privacy-policy', function () {
    return view('privacy');
})->name('privacy');



Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);


// ทำการ login
Route::post('/customer/login', [CustomerAuthController::class, 'login'])->name('customer.login.submit');

// Route::get('/login', [HomeController::class, 'index'])->middleware('guest')->name('login');

require __DIR__ . '/auth.php';
