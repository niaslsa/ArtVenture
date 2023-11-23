<?php
use App\Http\Controllers\LahanController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertiController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\BeritaController;
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
// Route::middleware(['g'])->group(function () {
Route::get('login', [AkunController::class, 'index'])->name('login');
Route::post('login', [AkunController::class, 'login']);
// });

// Dashboard
// Route::prefix('dashboard')->group(function () {});

Route::middleware(['auth'])->group(function () {
    // Properti
    Route::prefix('properti')
        ->middleware(['akses:staff_sarana'])
        ->group(function () {
            Route::get('/', [PropertiController::class, 'index']);
            Route::get('/tambah', [PropertiController::class, 'create']);
            Route::post('/simpan', [PropertiController::class, 'store']);
            Route::get('/edit/{id}', [PropertiController::class, 'edit']);
            Route::get('/detail/{id}', [PropertiController::class, 'detail']);
            Route::post('/edit/update', [PropertiController::class, 'update']);
            Route::delete('/hapus', [PropertiController::class, 'destroy']);
        });

    // Lahan
    Route::prefix('lahan')
        ->middleware(['akses:staff_sarana'])
        ->group(function () {
            Route::get('/', [LahanController::class, 'index']);
            Route::get('/tambah', [LahanController::class, 'create']);
            Route::post('/simpan', [LahanController::class, 'store']);
            Route::get('/edit/{id}', [LahanController::class, 'edit']);
            Route::get('/detail/{id}', [LahanController::class, 'detail']);
            Route::post('/edit/update', [LahanController::class, 'update']);
            Route::delete('/hapus', [LahanController::class, 'destroy']);
        });

    // Penyewaan
    Route::prefix('penyewaan')
        ->middleware(['akses:staff_sarana'])
        ->group(function () {
            Route::get('/', [PenyewaanController::class, 'index']);
            Route::get('/tambah', [PenyewaanController::class, 'create']);
            Route::post('/simpan', [PenyewaanController::class, 'store']);
            Route::get('/edit/{id}', [PenyewaanController::class, 'edit']);
            Route::get('/detail/{id}', [PenyewaanController::class, 'detail']);
            Route::post('/edit/update', [PenyewaanController::class, 'update']);
            Route::delete('/hapus', [PenyewaanController::class, 'destroy']);
            Route::get('/cetak', [PenyewaanController::class, 'cetakPenyewaan']);
        });

    // Berita
    Route::prefix('berita')
        ->middleware(['akses:jurnalis'])
        ->group(function () {
            Route::get('/', [BeritaController::class, 'index']);
            Route::get('/tambah', [BeritaController::class, 'create']);
            Route::post('/simpan', [BeritaController::class, 'store']);
            Route::get('/edit/{id}', [BeritaController::class, 'edit']);
            Route::get('/detail/{id}', [BeritaController::class, 'detail']);
            Route::post('edit/simpan', [BeritaController::class, 'update']);
            Route::delete('/hapus', [BeritaController::class, 'destroy']);
        });

    // Mitra
    Route::prefix('mitra')
        ->middleware(['akses:mitra'])
        ->group(function () {
            Route::get('/', [MitraController::class, 'index']);
            Route::get('/tambah', [MitraController::class, 'create']);
            Route::post('/simpan', [MitraController::class, 'store']);
            Route::get('/edit/{id}', [MitraController::class, 'edit']);
            Route::get('/detail/{id}', [MitraController::class, 'detail']);
            Route::post('edit/simpan', [MitraController::class, 'update']);
            Route::delete('/hapus', [MitraController::class, 'destroy']);
        });

    Route::get('logout', [AkunController::class, 'logout']);
});
