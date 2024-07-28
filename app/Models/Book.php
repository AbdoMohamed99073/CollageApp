<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'auther',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function course()
    {
        return $this->hasOne(Course::class,'book_id');
    }

    public function scopeFilter(Builder $builder, $filters)
    {
        $options = array_merge([
            'course_id' => null,

        ], $filters);

        $builder->when($options['course_id'], function ($builder, $value) {
            $builder->whereHas('courses', function ($builder, $value) {
                $builder->where('book_id', $value);
            });
        });

    }

    public static function rules($id = 0)
    {
        return [
            'name' => [
                Rule::unique('books', 'name')->ignore($id),
                'required',
                'string',
                'max:255',
            ],
            'description' => [
                'required',
                'string',
            ],
            'auther' => [
                'required',
                'string',
                'max:11',
            ],
        ];
    }
}
