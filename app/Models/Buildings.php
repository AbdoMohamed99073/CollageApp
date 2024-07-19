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
        return $this->belongsTo(Faculty::class,'building_id');
    }
}
