<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;


    public function buildings()
    {
        return $this->belongsTo(Buildings::class,'building_id' , 'id');
    }
    
    protected function collage()
    {
        return $this->belongsTo(Collage::class,'collage_id');
    }
    public function classroom()
    {
        return $this->hasMany(ClassRoom::class,'Faculty_id');
    }
    public function student()
    {
        return $this->hasMany(Student::class,'faculty_id');
    }
    public function teacher()
    {
        return $this->hasMany(Teacher::class , 'faculty_id');
    }
}
