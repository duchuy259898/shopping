<?php

use App\Http\Controllers\Admin\DucHuyController;
use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'category'],function(){
    Route::resource('/',DucHuyController::class);
    Route::get('index',[DucHuyController::class,'index'])->name('duchuy.category.index');
    Route::get('edit/{id}',[DucHuyController::class,'edit'])->name('duchuy.edit');
    Route::put('update/{id}',[DucHuyController::class,'update'])->name('duchuy.update');
    Route::get('create',[DucHuyController::class,'create'])->name('duchuy.create');
    Route::post('store',[DucHuyController::class,'store'])->name('duchuy.store');
    Route::get('delete/{id}',[DucHuyController::class,'destroy'])->name('duchuy.delete');
});
    
    