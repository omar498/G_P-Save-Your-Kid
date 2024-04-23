<?php

use App\Http\Controllers\Api\ParentController;
use App\Http\Controllers\Api\SupervisorController;
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

//web Dashboard Apis
//Supervisor
{
    Route::post('/SV/store', [SupervisorController::class, 'store']); //تمام
    Route::get('/SV/getall', [SupervisorController::class, 'index']); //تمام
    Route::get('/SV/show/{ID}', [SupervisorController::class, 'getSupervisor']);
    Route::put('/SV/update/{id}', [SupervisorController::class, 'update']); //تمام
    Route::delete('/SV/delete/{id}', [SupervisorController::class, 'destroy']); //تمام
}
//Parent
{
    Route::get('/parent/getall', [ParentController::class, 'index']); //تمام
    Route::get('/parent/show/{id}', [ParentController::class, 'getParent']); //تمام
    Route::Post('/parent/store', [ParentController::class, 'store']); //تمام
    Route::put('/parent/update/{id}', [ParentController::class, 'update']); //تمام
    Route::delete('/parent/delete/{id}', [ParentController::class, 'destroy']);
}
//Student
