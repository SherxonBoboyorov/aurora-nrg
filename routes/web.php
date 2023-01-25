<?php

use App\Http\Controllers\Admin\OptionsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\NumberController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\DizelController;
use App\Http\Controllers\Admin\UsefulResourceController;
use App\Http\Controllers\Admin\UslugController;
use App\Http\Controllers\Admin\CategoriyController;


use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\ServicesController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\CategoryController;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['role:admin'])->prefix('dashboard')->group(static function () {
    Route::get('/', [HomeController::class, 'index'])->name('homeAdmin');
    Route::resources([
        'slider' => SliderController::class,
        'page' => PagesController::class,
        'number' => NumberController::class,
        'article' => ArticleController::class,
        'dizel' => DizelController::class,
        'useful_resource' => UsefulResourceController::class,
        'uslug' => UslugController::class,
        'options' => OptionsController::class,
        'categoriy' => CategoriyController::class
    ]);
});

// front views

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function() {
        Route::get('/', [IndexController::class, 'homepage'])->name('/');
        Route::get('about', [AboutController::class, 'about'])->name('about');
        Route::get('products/{id}', [ProductController::class, 'index'])->name('products');
        Route::get('product/{dizel}/{category_id}', [ProductController::class, 'show'])->name('product.show');
        Route::get('services', [ServicesController::class, 'index'])->name('services');
        Route::get('articles', [BlogController::class, 'list'])->name('articles');
        Route::get('articles/{id}', [BlogController::class, 'show'])->name('article');
        Route::get('contact', [ContactController::class, 'index'])->name('contact');
        Route::post('save_callback', [ContactController::class, 'saveCallback'])->name('saveCallback');
        Route::post('save_send', [ProductController::class, 'saveSend'])->name('saveSend');
        Route::post('save_send', [ServicesController::class, 'saveSend'])->name('saveSend');
        Route::get('/index_in', [CategoryController::class, 'index'])->name('index_in');
        Route::get('/index_in/{id}', [CategoryController::class, 'categoriy'])->where(['id' => '[0-9]+']);
    });







