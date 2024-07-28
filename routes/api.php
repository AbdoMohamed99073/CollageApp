<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('/studentapi',StudentController::class);

Route::apiResource('/teacherapi',TeacherController::class);

Route::apiResource('/bookapi',BookController::class);


Route::get('/courses', [TeacherController::class , 'getallst']);
