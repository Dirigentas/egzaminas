<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TevasController as T;
use App\Http\Controllers\VaikasController as V;
use App\Http\Controllers\FrontController as F;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin/tevas')->name('tevas-')->group(function () {
    Route::get('/index', [T::class, 'index'])->name('index')->middleware('roles:A');    
    Route::get('/create', [T::class, 'create'])->name('create')->middleware('roles:A');
    Route::post('/store', [T::class, 'store'])->name('store')->middleware('roles:A');    
    Route::get('/edit/{tevas}', [T::class, 'edit'])->name('edit')->middleware('roles:A');
    Route::put('/update/{tevas}', [T::class, 'update'])->name('update')->middleware('roles:A');    
    Route::delete('/destroy/{tevas}', [T::class, 'destroy'])->name('destroy')->middleware('roles:A');    
});

Route::prefix('admin/vaikas')->name('vaikas-')->group(function () {
    Route::get('/index', [V::class, 'index'])->name('index')->middleware('roles:A');    
    Route::get('/create', [V::class, 'create'])->name('create')->middleware('roles:A');
    Route::post('/store', [V::class, 'store'])->name('store')->middleware('roles:A');    
    Route::get('/edit/{vaikas}', [V::class, 'edit'])->name('edit')->middleware('roles:A');
    Route::put('/update/{vaikas}', [V::class, 'update'])->name('update')->middleware('roles:A');    
    Route::delete('/destroy/{vaikas}', [V::class, 'destroy'])->name('destroy')->middleware('roles:A');    
});

Route::get('/', [F::class, 'index'])->name('index');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

?>