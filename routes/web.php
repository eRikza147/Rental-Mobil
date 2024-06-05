<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Car\CarController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Harga\HargaController;
use App\Http\Controllers\Merk\MerkController;


Route::middleware('belum_login')->group(function() {
    Route::get('/', [AuthController::class,'index'])->name('/');
    Route::get('register', [AuthController::class,'daftar'])->name('register');
    Route::post('login', [AuthController::class,'login'])->name('login');
    Route::post('register.post', [AuthController::class,'register'])->name('register.post');
    
});

Route::middleware('sudah_login')->group(function(){
    Route::get('logout', [AuthController::class,'logout'])->name('logout');
    Route::get('admin', [AdminController::class, 'home'])->name('admin');

    // customer
    route::get('customer',[CustomerController::class,'home'])->name('customer');
    Route::get('tambahcustomer',[CustomerController::class, 'tambah'])->name('tambahcustomer');
    Route::post('savecustomer',[CustomerController::class,'save'])->name('savecustomer');
    Route::get('editcustomer.data/{id}',[CustomerController::class,'edit'])->name('editcustomer');
    Route::post('updatecustomer.data/{id}',[CustomerController::class,'update'])->name('updatecustomer');
    Route::get('deletecustomer.data/{id}',[CustomerController::class,'delete'])->name('deletecustomer');

    // car
    Route::get('car', [CarController::class,'home'])->name('car');
    Route::get('tambahcar',[CarController::class, 'tambah'])->name('tambahcar');
    Route::post('savecar',[CarController::class,'save'])->name('savecar');
    Route::get('editcar.data/{id}',[CarController::class,'edit'])->name('editcar');
    Route::post('updatecar.data/{id}',[CarController::class,'update'])->name('updatecar');
    Route::get('deletecar.data/{id}',[CarController::class,'delete'])->name('deletecar');

    // merk
    Route::get('merk', [MerkController::class,'home'])->name('merk');
    Route::get('tamabhmerk',[MerkController::class,'tambah'])->name('tambahmerk');
    Route::post('savemerk',[MerkController::class,'save'])->name('savemerk');
    Route::get('editmerk.data/{id}',[MerkController::class,'edit'])->name('editmerk');
    Route::post('updatemerk.data/{id}',[MerkController::class,'update'])->name('updatemerk');
    Route::get('deletemerk.data/{id}',[MerkController::class,'delete'])->name('deletemerk');

    // harga
    Route::get('harga', [HargaController::class,'home'])->name('harga');
    Route::get('tamabhharga',[HargaController::class,'tambah'])->name('tambahharga');
    Route::post('saveharga',[HargaController::class,'save'])->name('saveharga');
    Route::get('editharga.data/{id}',[HargaController::class,'edit'])->name('editharga');
    Route::post('updateharga.data/{id}',[HargaController::class,'update'])->name('updateharga');
    Route::get('deleteharga.data/{id}',[HargaController::class,'delete'])->name('deleteharga');
});