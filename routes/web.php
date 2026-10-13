<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TechnicalSeoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/sitemap.xml', [TechnicalSeoController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [TechnicalSeoController::class, 'robots'])->name('robots');

Route::get('/book-appointment', [AppointmentController::class, 'create'])
    ->name('appointments.create');
Route::get('/book-appointment/available-slots', [AppointmentController::class, 'availableSlots'])
    ->name('appointments.available-slots');
Route::post('/book-appointment', [AppointmentController::class, 'store'])
    ->name('appointments.store');

/*
|--------------------------------------------------------------------------
| Blog
|--------------------------------------------------------------------------
*/

Route::get('/blog', [PostController::class, 'index'])->name('posts.index');

Route::get('/blog/live-search', [PostController::class, 'liveSearch'])
    ->name('posts.live-search');

Route::get('/posts/{post:slug}', [PostController::class, 'show'])
    ->name('posts.show');

Route::get('/category/{postCategory:slug}', [PostController::class, 'showByCategory'])
    ->name('posts.category');

Route::get('/tag/{tag:slug}', [PostController::class, 'showByTag'])
    ->name('posts.tag');

/*
|--------------------------------------------------------------------------
| Contact
|--------------------------------------------------------------------------
*/

Route::view('/contact', 'contact')->name('contact');

/*
|--------------------------------------------------------------------------
| Products
|--------------------------------------------------------------------------
*/

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

/*
| Live Search
| ต้องอยู่ก่อน /products/{product}
*/
Route::get('/products/live-search', [ProductController::class, 'liveSearch'])
    ->name('products.live-search');

Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');

Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])
    ->middleware(['auth:customer', 'verified'])
    ->name('review.submit');

/*
|--------------------------------------------------------------------------
| Customer
|--------------------------------------------------------------------------
*/

Route::middleware('auth:customer')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart/add/{id}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])
        ->name('cart.remove');

    Route::post('/cart/update', [CartController::class, 'update'])
        ->name('cart.update');

    Route::middleware('verified')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');

        Route::delete('/profile', [ProfileController::class, 'destroy'])
            ->name('profile.destroy');

        Route::get('/checkout', [CheckoutController::class, 'index'])
            ->name('checkout.index');

        Route::post('/checkout/process', [CheckoutController::class, 'process'])
            ->name('checkout.process');

        Route::get('/order-history', [OrderHistoryController::class, 'history'])
            ->name('order.history');
    });
});

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Legal
|--------------------------------------------------------------------------
*/

Route::view('/term-of-use', 'term')->name('term');

Route::view('/privacy-policy', 'privacy')->name('privacy');

require __DIR__.'/auth.php';
