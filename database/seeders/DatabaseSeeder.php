<?php

namespace Database\Seeders;

use App\Models\Caminhao;
use App\Models\Modelo;
use App\Models\Motorista;
use App\Models\Transportadora;
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
        //$transportadora = Transportadora::factory(5)->create();

        Motorista::factory(5)->create()->each(function ($motorista) {
            $transportadora = Transportadora::factory()->create();
            $motorista->transportadoras()->attach($transportadora);
        }) ;

        Modelo::factory(5)->create();
        Caminhao::factory(5)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

    }
}
