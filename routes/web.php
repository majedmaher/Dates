<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteUIController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubscribeController;
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

Route::get('/', [SiteUIController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function () {
    return view('layouts.app');
})->name('dashboard');



Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blogs/trashed', [BlogController::class, 'blogsTrashed'])->name('blog.trashed');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blog/show/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
Route::get('/blog/destroy/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
Route::get('/blog/hdelete/{id}', [BlogController::class, 'hdelete'])->name('blog.hdelete');
Route::get('/blog/restore/{id}', [BlogController::class, 'restore'])->name('blog.restore');



Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/trashed', [ProductController::class, 'productsTrashed'])->name('product.trashed');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/product/hdelete/{id}', [ProductController::class, 'hdelete'])->name('product.hdelete');
Route::get('/product/restore/{id}', [ProductController::class, 'restore'])->name('product.restore');



Route::get('/subscribes', [SubscribeController::class, 'index'])->name('subscribe.index');
Route::get('/subscribes/trashed', [SubscribeController::class, 'subscribesTrashed'])->name('subscribe.trashed');
Route::get('/subscribe/destroy/{id}', [SubscribeController::class, 'destroy'])->name('subscribe.destroy');
Route::get('/subscribe/hdelete/{id}', [SubscribeController::class, 'hdelete'])->name('subscribe.hdelete');
Route::get('/subscribe/restore/{id}', [SubscribeController::class, 'restore'])->name('subscribe.restore');
Route::post('/subscribe/store', [SiteUIController::class, 'subscribeStore'])->name('subscribe.store');



Route::get('/sliders', [SliderController::class, 'index'])->name('slider.index');
Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');
Route::post('/slider/store', [SliderController::class, 'store'])->name('slider.store');
Route::get('/slider/show/{id}', [SliderController::class, 'show'])->name('slider.show');
Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
Route::post('/slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');
Route::get('/slider/destroy/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
