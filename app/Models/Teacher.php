<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;


    public function course()
    {
        return $this->hasMany(Course::class,'teacher_id');
    }
    public function faculty()
    {
        return $this->belongsTo(Faculty::class , 'faculty_id');
    }

}
