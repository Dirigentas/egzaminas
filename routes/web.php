<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirmController as Firm;
use App\Http\Controllers\MenuController as Menu;
use App\Http\Controllers\DishController as Dish;
use App\Http\Controllers\FrontController as F;
use App\Http\Controllers\OrderController as O;


Route::prefix('admin/firm')->name('firm-')->group(function () {
    Route::get('/index', [Firm::class, 'index'])->name('index')->middleware('roles:A');    
    Route::get('/create', [Firm::class, 'create'])->name('create')->middleware('roles:A');
    Route::post('/store', [Firm::class, 'store'])->name('store')->middleware('roles:A');    
    Route::get('/edit/{firm}', [Firm::class, 'edit'])->name('edit')->middleware('roles:A');
    Route::put('/update/{firm}', [Firm::class, 'update'])->name('update')->middleware('roles:A');    
    Route::delete('/destroy/{firm}', [Firm::class, 'destroy'])->name('destroy')->middleware('roles:A');    
});

Route::prefix('admin/menu')->name('menu-')->group(function () {
    Route::get('/index', [Menu::class, 'index'])->name('index')->middleware('roles:A');    
    Route::get('/create', [Menu::class, 'create'])->name('create')->middleware('roles:A');
    Route::post('/store', [Menu::class, 'store'])->name('store')->middleware('roles:A');    
    Route::get('/edit/{menu}', [Menu::class, 'edit'])->name('edit')->middleware('roles:A');
    Route::put('/update/{menu}', [Menu::class, 'update'])->name('update')->middleware('roles:A');    
    Route::delete('/destroy/{menu}', [Menu::class, 'destroy'])->name('destroy')->middleware('roles:A');    
});

Route::prefix('admin/dish')->name('dish-')->group(function () {
    Route::get('/index', [Dish::class, 'index'])->name('index')->middleware('roles:A');    
    Route::get('/create', [Dish::class, 'create'])->name('create')->middleware('roles:A');
    Route::post('/store', [Dish::class, 'store'])->name('store')->middleware('roles:A');    
    Route::get('/edit/{dish}', [Dish::class, 'edit'])->name('edit')->middleware('roles:A');
    Route::put('/update/{dish}', [Dish::class, 'update'])->name('update')->middleware('roles:A');    
    Route::delete('/destroy/{dish}', [Dish::class, 'destroy'])->name('destroy')->middleware('roles:A');    
});

Route::get('/index', [F::class, 'index'])->name('index')->middleware('roles:A|K'); 
Route::get('/show/{firm}', [F::class, 'show'])->name('show')->middleware('roles:A|K');
Route::get('/showDish/{menu}', [F::class, 'showDish'])->name('showDish')->middleware('roles:A|K');
Route::post('add', [F::class, 'addToCart'])->name('add-to-cart');
Route::get('/cart', [F::class, 'cart'])->name('cart');
Route::post('/cart', [F::class, 'updateCart'])->name('update-cart');
Route::post('/make-order', [F::class, 'makeOrder'])->name('make-order');


Route::prefix('orders')->name('orders-')->group(function () {
    Route::get('/index', [O::class, 'index'])->name('index')->middleware('roles:A|K');
    Route::get('/pdf/{order}', [O::class, 'pdf'])->name('pdf')->middleware('roles:A|K');
    Route::put('/update/{order}', [O::class, 'update'])->name('update')->middleware('roles:A');
    Route::delete('/destroy/{order}', [O::class, 'destroy'])->name('destroy')->middleware('roles:A');
});



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

?>