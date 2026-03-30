<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\FelhasznaloController;
use App\Http\Controllers\MunkaController;
use App\Http\Controllers\SzolgaltatasController;

Route::post('/register', [FelhasznaloController::class, 'register']);
Route::post('/login', [FelhasznaloController::class, 'login']);
Route::get('/szolgaltatasok', [SzolgaltatasController::class, 'index']);

Route::middleware('api.token')->group(function () {
    Route::get('/me', [FelhasznaloController::class, 'me']);
    Route::post('/logout', [FelhasznaloController::class, 'logout']);

    Route::get('/my-autok', [AutoController::class, 'mine']);
    Route::post('/my-autok', [AutoController::class, 'store']);
    Route::delete('/my-autok/{id}', [AutoController::class, 'destroy']);

    Route::get('/my-foglalasok', [MunkaController::class, 'mine']);
    Route::post('/my-foglalasok', [MunkaController::class, 'store']);
    Route::delete('/my-foglalasok/{id}', [MunkaController::class, 'destroyOwn']);

    Route::middleware('admin.only')->group(function () {
        Route::get('/admin/orders', [MunkaController::class, 'adminIndex']);
        Route::delete('/admin/orders/{id}', [MunkaController::class, 'adminDestroy']);
    });
});
