<?php

namespace Database\Factories;

use App\Models\Modelo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Modelo>
 */
class ModeloFactory extends Factory
{
    protected $model = Modelo::class;

    public function definition(): array
    {
        return [
            'modelo_caminhao' => $this->faker->word(),
            'cor_caminhao' => $this->faker->colorName(),
        ];
    }
}
