<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\FelhasznaloController;
use App\Http\Controllers\TakaritoController;
use App\Http\Controllers\MunkaController;
use App\Http\Controllers\SzolgaltatasController;


Route::get('/autok',[AutoController::class,'index']);
Route::get('/autok/getByOwner',[AutoController::class,'getByOwner']);
Route::post('/autok', [AutoController::class, 'store']);
Route::put('/autok/update/{id}', [AutoController::class, 'update']);
Route::delete('/autok/delete/{id}', [AutoController::class, 'destroy']);

Route::get('/felhasznalok', [FelhasznaloController::class, 'index']);
Route::get('/felhasznalok/getByName', [FelhasznaloController::class, 'searchByName']);
Route::post('/felhasznalok', [FelhasznaloController::class, 'store']);
Route::put('/felhasznalok/update/{id}', [FelhasznaloController::class, 'update']);
Route::delete('/felhasznalok/delete/{id}', [FelhasznaloController::class, 'destroy']);

Route::get('/takaritok', [TakaritoController::class, 'index']);
Route::get('/takaritok/getByName', [TakaritoController::class, 'getByName']);
Route::post('/takaritok', [TakaritoController::class, 'store']);
Route::put('/takaritok/update/{id}', [TakaritoController::class, 'update']);
Route::delete('/takaritok/delete/{id}', [TakaritoController::class, 'destroy']);

Route::get('/munkak', [MunkaController::class, 'index']);
Route::get('/munkak/getByDate', [MunkaController::class, 'getByDate']);
Route::post('/munkak', [MunkaController::class, 'store']);
Route::put('/munkak/update/{id}', [MunkaController::class, 'update']);
Route::delete('/munkak/delete/{id}', [MunkaController::class, 'destroy']);

Route::get('/szolg', [SzolgaltatasController::class, 'index']);
Route::get('/szolg/getByPrice', [SzolgaltatasController::class, 'getByPrice']);
Route::post('/szolg', [SzolgaltatasController::class, 'store']);
Route::put('/szolg/update/{id}', [SzolgaltatasController::class, 'update']);
Route::delete('/szolg/delete/{id}', [SzolgaltatasController::class, 'destroy']);
