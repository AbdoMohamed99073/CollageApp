<?php

namespace Database\Factories;

use App\Models\Buildings;
use App\Models\Collage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faculty>
 */
class FacultyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' =>$this->faker->name,
            'Salary_Faculty' => $this->faker->randomFloat(null,1000,1500) ,
            'collage_id' => Collage::inRandomOrder()->first()->id,
            'Manger_id' => User::inRandomOrder()->first()->id ,
            'building_id' => Buildings::inRandomOrder()->first()->id,

        ];
    }
}
