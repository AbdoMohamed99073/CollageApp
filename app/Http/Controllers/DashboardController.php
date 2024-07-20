<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Buildings;
use App\Models\ClassRoom;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\Course;
use App\Models\StudentCourses;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getbuildings($re = null)
    {
        if($re == null)
        {
            $buildings = Buildings::get();
        }else
        {
            $buildings = Buildings::with($re)->get();
        }
        return response()->json($buildings , 200 );
    }


    public function getfaculties($re = null)
    {
        if($re == null)
        {
            $faculty = Faculty::get();
        }else
        {
            $faculty = Faculty::with($re)->get();
        }
        return response()->json($faculty , 200 );
    }
    public function getstudents($re = null)
    {
        if($re == null)
        {
            $students = Student::get();
        }else
        {
            $students = Student::with($re)->get();
        }
        return response()->json($students , 200 );
    }
    public function getbooks($re = null)
    {
        if($re == null)
        {
            $books = Book::get();
        }else
        {
            $books = Book::with($re)->get();
        }
        return response()->json($books , 200 );
    }
    public function getclassroom($re = null)
    {
        if($re == null)
        {
            $classrooms = ClassRoom::get();
        }else
        {
            $classrooms = ClassRoom::with($re)->get();
        }
        return response()->json($classrooms , 200 );
    }
    public function getcourses($re = null)
    {
        if($re == null)
        {
            $courses = Course::get();
        }else
        {
            $courses = Course::with($re)->get();
        }
        return response()->json($courses , 200 );
    }
    public function getteachers($re = null)
    {
        if($re == null)
        {
            $teachers = Teacher::get();
        }else
        {
            $teachers = Teacher::with($re)->get();
        }
        return response()->json($teachers , 200 );
    }
    public function getstudentscourses($re = null)
    {
        if($re == null)
        {
            $studentscourses = StudentCourses::get();
        }else
        {
            $studentscourses = StudentCourses::with($re)->get();
        }
        return response()->json($studentscourses , 200 );
    }
}
