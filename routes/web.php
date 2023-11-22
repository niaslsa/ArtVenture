<?php
use App\Http\Controllers\LahanController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertiController;
use App\Http\COntrollers\PenyewaanController;
use App\Models\Penyewaan;
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
Route::middleware(['guest'])->group(function () {
    Route::get('/', [AkunController::class, 'index'])->name('login');
    Route::post('/', [AkunController::class, 'login']);
});

// Dashboard
Route::prefix('dashboard')->group(function () {});
// Penyewaan
Route::prefix('penyewaan')->group(function () {});

Route::middleware(['auth'])->group(function () {
    // Properti
    Route::prefix('properti')->group(function () {
        Route::get('/', [PropertiController::class, 'index']);
        Route::get('/tambah', [PropertiController::class, 'create']);
        Route::post('/simpan', [PropertiController::class, 'store']);
        Route::get('/edit/{id}', [PropertiController::class, 'edit']);
        Route::get('/detail/{id}', [PropertiController::class, 'detail']);
        Route::post('/edit/update', [PropertiController::class, 'update']);
        Route::delete('/hapus', [PropertiController::class, 'destroy']);
    });

    // Lahan
    Route::prefix('lahan')->group(function () {
        Route::get('/', [LahanController::class, 'index']);
        Route::get('/tambah', [LahanController::class, 'create']);
        Route::post('/simpan', [LahanController::class, 'store']);
        Route::get('/edit/{id}', [LahanController::class, 'edit']);
        Route::get('/detail/{id}', [LahanController::class, 'detail']);
        Route::post('/edit/update', [LahanController::class, 'update']);
        Route::delete('/hapus', [LahanController::class, 'destroy']);
    });

    // Penyewaan
    Route::prefix('penyewaan')->group(function () {
        Route::get('/', [PenyewaanController::class, 'index']);
        Route::get('/tambah', [PenyewaanController::class, 'create']);
        Route::post('/simpan', [PenyewaanController::class, 'store']);
        Route::get('/edit/{id}', [PenyewaanController::class, 'edit']);
        Route::get('/detail/{id}', [PenyewaanController::class, 'detail']);
        Route::post('/edit/update', [PenyewaanController::class, 'update']);
        Route::delete('/hapus', [PenyewaanController::class, 'destroy']);
        Route::get('/cetak', [PenyewaanController::class, 'cetakPenyewaan']);
    });


    Route::get('logout', [AkunController::class, 'logout']);
});
