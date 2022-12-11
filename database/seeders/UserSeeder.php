<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->insert([
            'usuario_nome'  => 'Vinicius Souza',
            'usuario_email' => 'vini@gmail.com',
            'usuario_senha' => Hash::make('senha'),
            'usuario_cpf'   => '12345678901'
        ]);

        DB::table('usuario')->insert([
            'usuario_nome'  => 'Lucas Oliveira',
            'usuario_email' => 'lucas@gmail.com',
            'usuario_senha' => Hash::make('senha'),
            'usuario_cpf'   => '10987654321'
        ]);

        DB::table('usuario')->insert([
            'usuario_nome'  => 'Thiago Oliveira',
            'usuario_email' => 'thiago@gmail.com',
            'usuario_senha' => Hash::make('senha'),
            'usuario_cpf'   => '12312312312'
        ]);

        DB::table('usuario')->insert([
            'usuario_nome'  => 'Victor Oliveira',
            'usuario_email' => 'victor@gmail.com',
            'usuario_senha' => Hash::make('senha'),
            'usuario_cpf'   => '11111111111'
        ]);

        DB::table('usuario')->insert([
            'usuario_nome'  => 'Roberto Leal',
            'usuario_email' => 'roberto@gmail.com',
            'usuario_senha' => Hash::make('senha'),
            'usuario_cpf'   => '66666666666'
        ]);
    }
}
