<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class,'student_courses','student_id','course_id');
    }
}
