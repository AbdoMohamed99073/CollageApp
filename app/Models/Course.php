<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
    protected function book()
    {
        return $this->belongsTo(Book::class,'book_id');
    }
    public function student()
    {
        return $this->belongsToMany(Student::class,'student_courses','course_id','student_id');
    }
}
