<?php

use App\Http\Controllers\api\CollaboratorController;
use App\Http\Controllers\api\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::patch('/employees/{id}', [EmployeeController::class, 'update']);
Route::get('/employees/{any}', [EmployeeController::class, 'show']);
Route::get('/employees/', [EmployeeController::class, 'index']);
Route::post('/employees/', [EmployeeController::class, 'store']);

Route::get('/collaborators/', [CollaboratorController::class, 'index']);
