<?php

namespace Database\Factories;

use App\Models\Motorista;
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
            'nome_motorista' => $this->faker->name(),
            'cpf_motorista' => $this->faker->unique()->numerify('###########'),
            'data_nascimento_motorista' => $this->faker->date(),
            'email_motorista' => $this->faker->unique()->safeEmail,
        ];
    }
}
