<?php

namespace Database\Factories\React;

use App\Models\react\Categoria;
use App\Models\react\Grupo;
use App\Models\react\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\react\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->name();
        if(rand(1,2) === 1){
            return [
                'title_aside' => $name,
                'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name))),
                'categoria_id' => rand(1, count(Categoria::all())),
                'grupo_id' => null
            ];
        }
        return [
            'title_aside' => $name,
            'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name))),
            'categoria_id' => null,
            'grupo_id' => rand(1, count(Grupo::all()))
        ];
    }
}
