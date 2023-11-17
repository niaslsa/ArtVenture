<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\PropertiController;
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
Route::prefix('login')->group(function(){
    Route::get('/',[AkunController::class,'index'])->name('login');
});

// Properti
Route::prefix('properti')->middleware('properti,operator')->group(function () {
    Route::get('/properti', [PropertiController::class,'index']);
    Route::get('/properti/tambah', [PropertiController::class,'create']);
    Route::post('/properti/simpan', [PropertiController::class,'store']);
    Route::get('/properti/edit/{id}', [PropertiController::class,'edit']);
    Route::post('/properti/update', [PropertiController::class,'update']);
    Route::delete('/properti/hapus/', [PropertiController::class,'destroy']);
});

