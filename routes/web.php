<?php

use App\Http\Controllers\DataApbdController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\StructureStaffController;
use App\Http\Controllers\ProfilDesaController;
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

Route::get('/profildesa/create', [ProfilDesaController::class, 'create'])->name('profildesa.create-profildesa');
Route::post('/profildesa/store', [ProfilDesaController::class, 'store'])->name('profildesa.store');

Route::get('/dataapbd/create', [DataApbdController::class, 'create'])->name('dataapbd.create-dataapbd');
Route::post('/dataapbd/store', [DataApbdController::class, 'store'])->name('dataapbd.store');

Route::get ('/structures', [StructureController::class, 'index'])->name('structure.index');
Route::get ('/structures/staff', [StructureStaffController::class, 'index'])->name('staff.index');
Route::get ('/profil/desa', [ProfilDesaController::class, 'index'])->name('profil.index');
Route::get ('/data/apbd', [DataApbdController::class, 'index'])->name('dataapbd.index');