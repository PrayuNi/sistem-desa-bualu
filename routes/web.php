<?php

use App\Http\Controllers\DataApbdController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\StructureStaffController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\DataPendudukController;
use App\Http\Controllers\DataPendudukTamiuController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::middleware(['auth'])->group(function () {
    // Halaman Login
    Route::get('/profile', [ProfilDesaController::class, 'show'])->name('profile.show');

    // Halaman Logout
    Route::post('/logout', function () {
        Auth::logout();

        return redirect('/login');
    })->name('logout');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post ('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

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
Route::get ('/structurestaff', [StructureStaffController::class, 'index'])->name('staff.index');

Route::get('/profildesa/create', [ProfilDesaController::class, 'create'])->name('profildesa.create-profildesa');
Route::post('/profildesa/store', [ProfilDesaController::class, 'store'])->name('profildesa.store');
Route::delete('/profildesa/delete/{id}', [ProfilDesaController::class, 'delete'])->name('profildesa.delete');
Route::get('/profildesa/edit/{id}', [ProfilDesaController::class, 'edit'])->name('profildesa.edit-profildesa');
Route::post('/profildesa/update/{id}', [ProfilDesaController::class, 'update'])->name('profildesa.update');
Route::get ('/profildesa', [ProfilDesaController::class, 'index'])->name('profil.index');

Route::get('/dataapbd/create', [DataApbdController::class, 'create'])->name('dataapbd.create-dataapbd');
Route::post('/dataapbd/store', [DataApbdController::class, 'store'])->name('dataapbd.store');
Route::delete('/dataapbd/delete/{id}', [DataApbdController::class, 'delete'])->name('dataapbd.delete');
Route::get ('/dataapbd', [DataApbdController::class, 'index'])->name('dataapbd.index');

Route::post('/datapenduduk/store', [DataPendudukController::class, 'store'])->name('datapenduduk.store');
Route::get('/datapenduduk/edit/{id}', [DataPendudukController::class, 'edit'])->name('datapenduduk.edit-datapenduduk');
Route::post('/datapenduduk/update/{id}', [DataPendudukController::class, 'update'])->name('datapenduduk.update');
Route::get('/datapenduduk', [DataPendudukController::class, 'index'])->name('datapenduduk.index');

Route::post('/datapenduduktamiu/store', [DataPendudukTamiuController::class, 'store'])->name('datapenduduktamiu.store');
Route::get('/datapenduduktamiu/edit/{id}', [DataPendudukTamiuController::class, 'edit'])->name('datapenduduktamiu.edit-datapenduduktamiu');
Route::post('/datapenduduktamiu/update/{id}', [DataPendudukTamiuController::class, 'update'])->name('datapenduduktamiu.update');
Route::get('/datapenduduktamiu', [DataPendudukTamiuController::class, 'index'])->name('datapenduduktamiu.index');

Route::get('/pengajuansurat/create', [PengajuanSuratController::class, 'create'])->name('pengajuansurat.create-pengajuansurat');
Route::post('/pengajuansurat/store', [PengajuanSuratController::class, 'store'])->name('pengajuansurat.store');
Route::delete('/pengajuansurat/delete/{id}', [PengajuanSuratController::class, 'delete'])->name('pengajuansurat.delete');
Route::get('/pengajuansurat/edit/{id}', [PengajuanSuratController::class, 'edit'])->name('pengajuansurat.edit');
Route::post('/pengajuansurat/update/{id}', [PengajuanSuratController::class, 'update'])->name('pengajuansurat.update');
Route::get('/pengajuansurats', [PengajuanSuratController::class, 'index'])->name('pengajuansurat.index');

Route::get('/jenissurat/create', [JenisSuratController::class, 'create'])->name('jenissurat.create-jenissurat');
Route::post('/jenissurat/store', [JenisSuratController::class, 'store'])->name('jenissurat.store');
Route::delete('/jenissurat/delete/{id}', [JenisSuratController::class, 'delete'])->name('jenissurat.delete');
Route::get('/jenissurat/edit/{id}', [JenisSuratController::class, 'edit'])->name('jenissurat.edit');
Route::post('/jenissurat/update/{id}', [JenisSuratController::class, 'update'])->name('jenissurat.update');
Route::get('/jenissurats', [JenisSuratController::class, 'index'])->name('jenissurat.index');



