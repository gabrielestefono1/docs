<?php

namespace Database\Seeders;

use App\Models\react\Categoria;
use App\Models\react\Grupo;
use App\Models\react\Post;
use App\Models\react\Texto;
use App\Models\User;
use Database\Factories\React\GrupoFactory;
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

        Categoria::factory(10)->create();
        Grupo::factory(5)->create();
        Post::factory(50)->create();
        Texto::factory(500)->create();
    }
}
