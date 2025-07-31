<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\StructureStaffController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/create', [UserController::class, 'create'])->name('user.create-user');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

Route::get('/structure/create', [StructureController::class, 'create'])->name('structure.create-structure');
Route::post('/structure/store', [StructureController::class, 'store'])->name('structure.store');

Route::get('/structurestaff/create', [StructureStaffController::class, 'create'])->name('structurestaff.create-structurestaff');
Route::post('/structurestaff/store', [StructureStaffController::class, 'store'])->name('structurestaff.store');

