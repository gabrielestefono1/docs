<?php

namespace Database\Seeders;

use App\Models\react\Categoria;
use App\Models\react\Post;
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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        Categoria::factory()
            ->count(10)
            ->create()
            ->each(function ($categoria) {
                $posts = Post::factory()
                    ->count(rand(1, 3))
                    ->create(['categoria_id' => $categoria->id]);
                
                $posts->each(function ($post) use ($posts) {
                    if ($post->tem_filhos) {
                        Post::factory()
                            ->count(rand(1, 2))
                            ->create([
                                'categoria_id' => $post->categoria_id,
                                'id_pai' => $post->id,
                                'filho' => true,
                                'tem_filhos' => false,
                            ]);
                    }
                });
            });
    }
}
