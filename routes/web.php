<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Main\DashboardController;
use App\Http\Controllers\Main\User\{ProfileController, EmployeeController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('guest')->prefix('/admin')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'process_login']);

    // Route For Sending Scoring
    Route::get('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'main']);

    // Admin
    Route::prefix('/admin')->group(function () {
        // Profile
        Route::prefix('/profile')->group(function () {
            Route::get('/', [ProfileController::class, 'index']);
            Route::put('/', [ProfileController::class, 'update']);
        });

        // Employee
        Route::prefix('/employee')->group(function () {
            Route::get('/', [EmployeeController::class, 'index']);
            Route::get('/pdf/{id}', [EmployeeController::class, 'previewQr']);
            Route::get('/detail/{id}', [EmployeeController::class, 'detail']);
            Route::post('/warn', [EmployeeController::class, 'warn']);
        });

        // Logout
        Route::post('/logout', [AuthController::class, 'logout']);
    }); 
});