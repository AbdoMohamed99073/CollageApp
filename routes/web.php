<?php

use App\Models\Buildings;
use App\Models\Faculty;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/test',function(){
    $s = Student::where('id' , 1)->with('courses')->first();

    dd($s->toArray());
});

