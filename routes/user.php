<?php

use App\Http\Controllers\Admin\DucHuyController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function () {
    Route::resource('/',UserController::class);
    Route::get('index',[UserController::class,'index'])->name('duchuy.user.index');
    Route::get('edit/{id}',[UserController::class,'edit'])->name('user.edit');
    Route::put('update/{id}',[UserController::class,'update'])->name('user.update');
    Route::get('create',[UserController::class,'create'])->name('duchuy.user.create');
    Route::post('store',[UserController::class,'store'])->name('user.store');
    Route::get('delete/{id}',[UserController::class,'destroy'])->name('user.delete');

    
});