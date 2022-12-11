<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $pass = '';

        for ($i = 0; $i < 8; $i++)
            $pass .= rand(0, 9);

        return [
            'usuario_nome'  => fake()->name(),
            'usuario_email' => fake()->safeEmail(),
            'usuario_senha' => Hash::make('senha'), // password
            'usuario_cpf'   => $pass
        ];
    }
}
