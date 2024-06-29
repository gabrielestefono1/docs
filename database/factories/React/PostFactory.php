<?php

namespace Database\Factories\React;

use App\Models\react\Categoria;
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
        $random = rand(1, 5);
        $categoria = Categoria::inRandomOrder()->first();
        $temFilhos = $categoria && rand(0, 1);
        $filho = !$temFilhos && Categoria::count() > 1 ? rand(0, 1) : false;
        $idPai = $filho ? Post::where('tem_filhos', true)->inRandomOrder()->first()->id ?? null : null;

        return [
            'title_aside' => $this->faker->word,
            'categoria_id' => $random === 1 ? 1 : Categoria::factory(),
            'id_pai' => $idPai,
            'tem_filhos' => $temFilhos,
            'filho' => $filho,
        ];
    }
}
