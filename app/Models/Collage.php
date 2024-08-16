<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Collage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'totalStudent',
        'image',

    ];

    protected $hidden = [
        'updated_at',
        'user_id',
        'created_at',
    ];



    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function faculty()
    {
        return $this->hasMany(Faculty::class,'collage_id');
    }

    public function building()
    {
        return $this->hasMany(Buildings::class,'collage_id','id');
    }


}
