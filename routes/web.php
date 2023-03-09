<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirmController as Firm;
use App\Http\Controllers\MenuController as Menu;
use App\Http\Controllers\DishController as Dish;
use App\Http\Controllers\FrontController as F;


Route::get('/', function () {
    return view('welcome');
});

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

Route::get('/', [F::class, 'index'])->name('index')->middleware('roles:A|K'); 



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

?>