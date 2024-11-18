<?php

namespace Database\Factories;

use App\Models\Caminhao;
use App\Models\Modelo;
use App\Models\Motorista;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Caminhao>
 */
class CaminhaoFactory extends Factory
{
    protected $model = Caminhao::class;

    public function definition(): array
    {
        return [
            'placa_caminhao' => $this->faker->bothify('???#?##'),
            'motorista_id' => Motorista::factory(),
            'modelo_id' => Modelo::factory(),
        ];
    }
}
