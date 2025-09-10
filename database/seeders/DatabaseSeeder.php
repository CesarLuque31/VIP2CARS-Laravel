<?php

namespace Database\Seeders;

use App\Models\Usuario;
use App\Models\Vehiculo;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Usuarios de prueba (opcional)
        // Usuario::factory()->count(1)->create();

        // Vehículos de prueba
        \App\Models\Vehiculo::factory()->count(25)->create();
    }
}
