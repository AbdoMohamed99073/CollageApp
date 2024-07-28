<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'date_birth',
        'phone_number',
        'faculty_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function courses()
    {
        return $this->belongsToMany(
            Course::class,
            'student_course',
            'student_id',
            'course_id'
        );
    }

    // Scope Relations
    public function scopeFilter(Builder $builder, $filters)
    {
        $options = array_merge([
            'faculty_id' => null,
            'course_id' => null,

        ], $filters);

        $builder->when($options['faculty_id'], function ($builder, $value) {
            $builder->where('faculty_id', $value);
        });

        $builder->when($options['course_id'], function ($builder, $value) {
            $builder->whereHas('courses', function ($builder, $value) {
                $builder->where('student_id', $value);
            });
        });

    }

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return 'https://www.google.com/imgres?q=default%20image%20product&imgurl=https%3A%2F%2Fcurie.pnnl.gov%2Fsites%2Fdefault%2Ffiles%2Fdefault_images%2Fdefault-image_0.jpeg&imgrefurl=https%3A%2F%2Fcurie.pnnl.gov%2Findex.php%2Ftaxonomy%2Fterm%2F267&docid=T6snBwoI1gW1oM&tbnid=6tO2K22XfMJMrM&vet=12ahUKEwj9jpikpsKHAxUPfKQEHUX1AuoQM3oECH8QAA..i&w=500&h=500&hcb=2&ved=2ahUKEwj9jpikpsKHAxUPfKQEHUX1AuoQM3oECH8QAA';
        }
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }
        return asset('storage/' . $this->image);
    }

    public static function rules($id = 0)
    {
        return [
            'name' => [
                Rule::unique('students', 'name')->ignore($id),
                'required',
                'string',
                'max:255',
            ],
            'gender' => [
                'required',
                'in:male,female',
            ],
            'date_birth' => [
                'nullable',
                'date',
            ],
            'status' => [
                'in:active,archived',
            ],
            'phone_number' => [
                'required',
                'string',
                'max:11',
            ],
            'faculty_id' => [
                'required',
                'exists:faculties,id'
            ],
        ];
    }
}







/*

  $builder->whereRow('id IN (SELECT product_id FROM product_tag WHERE tag_id = ?)' , [$value]);

                    // Best Performance
                    $builder->whereRow(' EXIXTS (SELECT 1 FROM product_tag WHERE tag_id = ? AND product_id = products.id)',[$value]);

                    $builder->whereExists(function($quary) use ($value)
                    {
                        $quary->select(1)
                            ->from('student_course')
                            ->whereRow('student_id = students.id')
                            ->where('course_id' , $value);
                    });*/
