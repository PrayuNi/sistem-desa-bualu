<?php

use App\Http\Controllers\DataApbdController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\StructureStaffController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanSuratController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/', [DashboardController::class, 'index']);

Route::get('/populations', [DashboardController::class, 'listpopulation'])->name('population.index');
Route::get('/populations/edit/{id}', [DashboardController::class, 'editpopulation'])->name('population.edit');
Route::post('/populations/update/{id}', [DashboardController::class, 'updatepopulation'])->name('population.update');

Route::get('/financials', [DashboardController::class, 'listfinancial'])->name('financial.index');
Route::get('/financials/edit/{id}', [DashboardController::class, 'editfinancial'])->name('financial.edit');
Route::post('/financials/update/{id}', [DashboardController::class, 'updatefinancial'])->name('financial.update');


// Route::get('/', [PopulationController::class, 'index']);


Route::get('/user/create', [UserController::class, 'create'])->name('user.create-user');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::delete('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
Route::get ('/user', [UserController::class, 'index'])->name('user.index');

Route::get('/structure/create', [StructureController::class, 'create'])->name('structure.create-structure');
Route::post('/structure/store', [StructureController::class, 'store'])->name('structure.store');
Route::delete('/structure/delete/{id}', [StructureController::class, 'delete'])->name('structure.delete');
Route::get('/structure/edit/{id}', [StructureController::class, 'edit'])->name('structure.edit-structure');
Route::post('/structure/update/{id}', [StructureController::class, 'update'])->name('structure.update');
Route::get('/structures', [StructureController::class, 'index'])->name('structure.index');

Route::get('/structurestaff/create', [StructureStaffController::class, 'create'])->name('structurestaff.create-structurestaff');
Route::post('/structurestaff/store', [StructureStaffController::class, 'store'])->name('structurestaff.store');
Route::delete('/structurestaff/delete/{id}', [StructureStaffController::class, 'delete'])->name('structurestaff.delete');
Route::get('/structurestaff/edit/{id}', [StructureStaffController::class, 'edit'])->name('structurestaff.edit-structurestaff');
Route::post('/structurestaff/update/{id}', [StructureStaffController::class, 'update'])->name('structurestaff.update');
Route::get ('/structures/staff', [StructureStaffController::class, 'index'])->name('staff.index');

Route::get('/profildesa/create', [ProfilDesaController::class, 'create'])->name('profildesa.create-profildesa');
Route::post('/profildesa/store', [ProfilDesaController::class, 'store'])->name('profildesa.store');
Route::delete('/profildesa/delete/{id}', [ProfilDesaController::class, 'delete'])->name('profildesa.delete');
Route::get ('/profildesa', [ProfilDesaController::class, 'index'])->name('profil.index');

Route::get('/dataapbd/create', [DataApbdController::class, 'create'])->name('dataapbd.create-dataapbd');
Route::post('/dataapbd/store', [DataApbdController::class, 'store'])->name('dataapbd.store');
Route::delete('/dataapbd/delete/{id}', [DataApbdController::class, 'delete'])->name('dataapbd.delete');
Route::get ('/dataapbd', [DataApbdController::class, 'index'])->name('dataapbd.index');

Route::get('/pengajuansurat/create', [PengajuanSuratController::class, 'create'])->name('pengajuansurat.create-pengajuansurat');
Route::post('/pengajuansurat/store', [PengajuanSuratController::class, 'store'])->name('pengajuansurat.store');
Route::delete('/pengajuansurat/delete/{id}', [PengajuanSuratController::class, 'delete'])->name('structure.delete');
Route::get('/pengajuansurat/edit/{id}', [PengajuanSuratController::class, 'edit'])->name('pengajuansurat.edit');
Route::post('/pengajuansurat/update/{id}', [PengajuanSuratController::class, 'update'])->name('pengajuansurat.update');
Route::get('/pengajuansurats', [PengajuanSuratController::class, 'index'])->name('pengajuansurat.index');

