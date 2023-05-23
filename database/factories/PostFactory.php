<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;
/* importo este helper*/
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->word(20);

        return [
            'name' => $name,
            'slug' => Str::slug($name), //este helper genera el slug
            'extractor' => $this->faker->text(250), //lleno este campo con 250caracteres
            'body' => $this->faker->text(2000),
            'status' => $this->faker->randomElement([1, 2]), //lleno status con el valor 1 o 2 ALTERNA
            'category_id' => Category::all()->random()->id, //con el metodo all()->me traigo todo la tabla Category y extraigo de forma random el id
            'user_id' => User::all()->random()->id,
        ];
    }
}
