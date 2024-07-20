<?php

namespace Database\Factories;

use App\Models\Collage;
use Illuminate\Database\Eloquent\Factories\Factory;



class BuildingsFactory extends Factory
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
            'collage_id' =>  Collage::inRandomOrder()->first()->id , 
        ];
    }
}
