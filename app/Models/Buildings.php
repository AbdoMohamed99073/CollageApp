<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buildings extends Model
{
    use HasFactory;

    protected $table = "Buildings";


    public function faculty()
    {
        return $this->hasOne(Faculty::class,'building_id','id');
    }

    public function collage()
    {
        return $this->belongsTo(Collage::class,'collage_id','id');
    }
    public function classroom()
    {
        return $this->hasMany(ClassRoom::class,'Buliding_id');
    }
}
