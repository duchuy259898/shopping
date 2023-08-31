<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DucHuyController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin');
});
// Route::group(['prefix' => 'duchuy'],function(){
//     Route::resource('/',DucHuyController::class);
//     Route::get('index',[DucHuyController::class,'index'])->name('duchuy.index');
//     Route::get('edit/{id}',[DucHuyController::class,'edit'])->name('duchuy.edit');
//     Route::put('update/{id}',[DucHuyController::class,'update'])->name('duchuy.update');
//     Route::get('create',[DucHuyController::class,'create'])->name('duchuy.create');
//     Route::post('store',[DucHuyController::class,'store'])->name('duchuy.store');
//     Route::get('delete/{id}',[DucHuyController::class,'destroy'])->name('duchuy.delete');
// });
// Route::get('/duchuy',[DucHuyController::class],'index');
Route::group(['prefix' => '/','middleware' => 'auth'],function(){
    Route::get('/home',[AdminController::class,'index'])->name('admin');
    Route::get('/logout',[AdminController::class,'logout'])->name('logout');

    Route::resource('/category',DucHuyController::class);
    Route::get('/category/create',[DucHuyController::class,'create'])->name('category.create');
    
    Route::resource('/user',UserController::class);
    Route::get('/user/create',[UserController::class,'create'])->name('user.create');

});
Route::get('/login',[AdminController::class,'login'])->name('login');
Route::post('/login',[AdminController::class,'postLogin'])->name('login');
