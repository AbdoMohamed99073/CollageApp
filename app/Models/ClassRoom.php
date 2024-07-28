<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    public $incrementing = false;

    public function building()
    {
        return $this->belongsTo(Buildings::class , 'Buliding_id');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class , 'Faculty_id');
    }
}
