<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buildings extends Model
{
    use HasFactory;

    protected $table = "Buildings";
    protected $fillable = [
        'name',
        'collage_id',
        'image',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function faculty()
    {
        return $this->hasOne(Faculty::class, 'building_id', 'id');
    }

    public function collage()
    {
        return $this->belongsTo(Collage::class, 'collage_id', 'id');
    }
    public function classroom()
    {
        return $this->hasMany(ClassRoom::class, 'Buliding_id');
    }

    public function scopeFilter(Builder $builder, $filters)
    {
        $options = array_merge([
            'building_id' => null,
            'collage_id' => null,
            'Buliding_id' => null,

        ], $filters);

        $builder->when($options['building_id'], function ($quary, $status) {
            return $quary->where('building_id', $status);
        });
        $builder->when($options['collage_id'], function ($builder, $value) {
            $builder->where('collage_id', $value); 
        });

        $builder->when($options['Buliding_id'], function ($builder, $value) {
            $builder->where('Buliding_id', $value);
        });
    }

}
