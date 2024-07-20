<?php

namespace Database\Factories;

use App\Models\Buildings;
use App\Models\Faculty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassRoom>
 */
class ClassRoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'RoomNumber' => $this->faker->randomNumber(),
            'Buliding_id' =>Buildings::inRandomOrder()->first()->id ,
            'Faculty_id' => Faculty::inRandomOrder()->first()->id ,
        ];
    }
}
