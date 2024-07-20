<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/buildings/{re?}',[DashboardController::class,'getbuildings']);

Route::get('/faculty/{re?}',[DashboardController::class,'getfaculties']);

Route::get('/students/{re?}',[DashboardController::class,'getstudents']);

Route::get('/books/{re?}',[DashboardController::class,'getbooks']);

Route::get('/classrooms/{re?}',[DashboardController::class,'getclassroom']);

Route::get('/courses/{re?}',[DashboardController::class,'getcourses']);

Route::get('/teachers/{re?}',[DashboardController::class,'getteachers']);

Route::get('/studentcourses/{re?}',[DashboardController::class,'getstudentscourses']);