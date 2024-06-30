<?php

namespace Database\Factories\React;

use App\Models\react\Grupo;
use App\Models\react\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\react\Texto>
 */
class TextoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rand = rand(1, 5);
        if($rand > 4){
            return [
                'titulo' => fake()->sentence(),
                'corpo' => fake()->paragraph(3),
                'post_id' => null,
                'grupo_id' => rand(1, count(Grupo::all()))
            ];
        }
        return [
            'titulo' => fake()->sentence(),
            'corpo' => fake()->paragraph(3),
            'post_id' => rand(1, count(Post::all())),
            'grupo_id' => null
        ];
    }
}
