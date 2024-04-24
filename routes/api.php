<?php

use App\Http\Controllers\Api\ParentController;
use App\Http\Controllers\Api\StudentController;
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
    Route::post('/SV/store', [SupervisorController::class, 'store']);
    Route::get('/SV/getall', [SupervisorController::class, 'index']);
    Route::get('/SV/show/{ID}', [SupervisorController::class, 'getSupervisor']);
    Route::put('/SV/update/{id}', [SupervisorController::class, 'update']);
    Route::delete('/SV/delete/{id}', [SupervisorController::class, 'destroy']);
}
//Parent
{
    Route::get('/parent/getall', [ParentController::class, 'index']);
    Route::get('/parent/show/{id}', [ParentController::class, 'getParent']);
    Route::Post('/parent/store', [ParentController::class, 'store']);
    Route::put('/parent/update/{id}', [ParentController::class, 'update']);
    Route::delete('/parent/delete/{id}', [ParentController::class, 'destroy']);
}
//Student
Route::get('/student/getall', [StudentController::class, 'index']);
Route::get('/student/show/{id}', [StudentController::class, 'getStudent']);
Route::Post('/student/store', [StudentController::class, 'store']);
Route::put('/student/update/{id}', [StudentController::class, 'update']);
Route::delete('/student/delete/{id}', [StudentController::class, 'destroy']);
