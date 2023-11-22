<?php
use App\Http\Controllers\LahanController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\MitraController;
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
// Login
Route::get('/',[AkunController::class,'index'])->name('login');
     Route::prefix('login')->group(function(){
});

// Dashboard
Route::prefix('dashboard')->group(function () {
});
// Penyewaan 
Route::prefix('penyewaan')->group(function () {

});
// Properti
Route::prefix('properti')->group(function () {
    Route::get('/', [PropertiController::class,'index']);
    Route::get('/tambah', [PropertiController::class,'create']);
    Route::post('/simpan', [PropertiController::class,'store']);
    Route::get('/edit/{id}', [PropertiController::class,'edit']);
    Route::post('/edit/update', [PropertiController::class,'update']);
    Route::delete('/hapus', [PropertiController::class,'destroy']);
});

// Lahan
Route::prefix('lahan')->group(function () {
    Route::get('/', [LahanController::class,'index']);
    Route::get('/tambah', [LahanController::class,'create']);
    Route::post('/simpan', [LahanController::class,'store']);
    Route::get('/edit/{id}', [LahanController::class,'edit']);
    Route::post('/edit/update', [LahanController::class,'update']);
    Route::delete('/hapus', [LahanController::class,'destroy']);
});

// Berita
Route::prefix('berita')->group(function () {
    Route::get('/', [BeritaController::class,'index']);
    Route::get('/tambah', [BeritaController::class,'create']);
    Route::post('/simpan', [BeritaController::class,'store']);
    Route::get('/edit/{id}', [BeritaController::class,'edit']);
    Route::get('/detail/{id}', [BeritaController::class,'detail']);
    Route::post('edit/simpan', [BeritaController::class,'update']);
    Route::delete('/hapus', [BeritaController::class,'destroy']);
});

// Mitra
Route::prefix('mitra')->group(function () {
    Route::get('/', [MitraController::class,'index']);
    Route::get('/tambah', [MitraController::class,'create']);
    Route::post('/simpan', [MitraController::class,'store']);
    Route::get('/edit/{id}', [MitraController::class,'edit']);
    Route::get('/detail/{id}', [MitraController::class,'detail']);
    Route::post('edit/simpan', [MitraController::class,'update']);
    Route::delete('/hapus', [MitraController::class,'destroy']);
});