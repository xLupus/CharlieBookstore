<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'categoria_nome'  => 'Ação',
            'categoria_desc'  => 'Livros de Ação',
            'categoria_ativo' => TRUE
        ]);

        Categoria::create([
            'categoria_nome'  => 'Aventura',
            'categoria_desc'  => 'Livros de Aventura',
            'categoria_ativo' => TRUE
        ]);

        Categoria::create([
            'categoria_nome'  => 'Comêdia',
            'categoria_desc'  => 'Livros de Comêdia',
            'categoria_ativo' => TRUE
        ]);

        Categoria::create([
            'categoria_nome'  => 'Terror',
            'categoria_desc'  => 'Livros de Terror',
            'categoria_ativo' => TRUE
        ]);

        Categoria::create([
            'categoria_nome'  => 'Fantasia',
            'categoria_desc'  => 'Livros de Fantasia',
            'categoria_ativo' => TRUE
        ]);

        Categoria::create([
            'categoria_nome'  => 'Ficção Cientifica',
            'categoria_desc'  => 'Livros de Ficção Cientifica',
            'categoria_ativo' => TRUE
        ]);
    }
}
