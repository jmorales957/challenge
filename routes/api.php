<?php

use App\Http\Controllers\Employee\EmployeeController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('employees')->group(function () {
    Route::get('/{id}', [EmployeeController::class, 'getById'])->name('employees.getById');
    Route::post('/', [EmployeeController::class, 'create'])->name('employees.create');
    Route::put('/{id}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/{id}', [EmployeeController::class, 'delete'])->name('employees.destroy');
    Route::get('/', [EmployeeController::class, 'getAll'])->name('employees.getAll');
});
