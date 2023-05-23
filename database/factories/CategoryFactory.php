<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; //transforma esto-> Pepe Lopez en ->pepe-lopez (es para la url)

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //creo variable para almacenar el nombre
        $name = $this->faker->unique()->word(20); //se va a llenar con una palabra unica de 20 caracteres
        return [
            'name' => $name,
            'slug' => Str::slug($name)
        ];
    }
}
