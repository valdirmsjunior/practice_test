<?php

namespace Database\Factories;

use App\Models\Transportadora;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transportadora>
 */
class TransportadoraFactory extends Factory
{
    protected $model = Transportadora::class;

    public function definition(): array
    {
        return [
            'nome_transportadora' => $this->faker->company(),
            'cnpj_transportadora' => $this->faker->numerify('##############'),
            'status_transportadora' => 1,
        ];
    }
}
