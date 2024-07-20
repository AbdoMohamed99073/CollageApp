<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Buildings;
use App\Models\ClassRoom;
use App\Models\Collage;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\StudentCourses;
use App\Models\Teacher;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
       
       
        $this->call(UserSeeder::class);
        Collage::factory(1)->create();
            Buildings::factory(10)->create();
            Faculty::factory(15)->create();
            ClassRoom::factory(10)->create();
            Student::factory(100)->create();
            Teacher::factory(20)->create();
            Book::factory(20)->create();
            Course::factory(50)->create();

            StudentCourses::factory(20)->create();

    }
}
