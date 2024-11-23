<?php

namespace Database\Factories;

use App\Models\Motorista;
use App\Models\Transportadora;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Motorista>
 */
class MotoristaFactory extends Factory
{
    protected $model = Motorista::class;

    public function definition(): array
    {
        return [
            'nome_motorista' => fake()->name(),
            'cpf_motorista' => fake()->cpf(),
            'data_nascimento_motorista' => fake()->date(format: 'd/m/Y'),
            'email_motorista' => fake()->email()
        ];
    }
}
