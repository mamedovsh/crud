<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfGeneratorController;

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/resume/{id}', [PdfGeneratorController::class, 'index']);
// Route::get('/', function () {
//     return view('welcome');
// });
