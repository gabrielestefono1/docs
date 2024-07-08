<?php

namespace Database\Seeders;

use App\Models\react\Categoria as ReactCategoria;
use App\Models\react\Grupo  as ReactGrupo;
use App\Models\react\Post  as ReactPost;
use App\Models\react\Texto  as ReactTexto;
use App\Models\spring\Grupo as SpringGrupo;
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

        // ReactCategoria::factory(10)->create();
        // ReactGrupo::factory(5)->create();
        // ReactPost::factory(50)->create();
        // ReactTexto::factory(500)->create();

        SpringGrupo::factory(10)->create();
    }
}
