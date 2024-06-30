<?php

namespace Database\Factories\React;

use App\Models\react\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\react\Grupo>
 */
class GrupoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();
        return [
            'title_aside' => $name,
            'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name))),
            'categoria_id' => rand(1, count(Categoria::all()))
        ];
    }
}
