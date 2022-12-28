<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produto::create([
            'produto_nome'     => 'Harry Potter e a Pedra Filosofal',
            'produto_desc'     => 'Descricao Pendente',
            'produto_preco'    => 39,
            'produto_desconto' => 0,
            'produto_ativo'    => TRUE,
            'categoria_id'     => rand(1, 6),
        ]);

        Produto::create([
            'produto_nome'     => 'Harry Potter e a Camêra Secreta',
            'produto_desc'     => 'Descricao Pendente',
            'produto_preco'    => 39,
            'produto_desconto' => 0,
            'produto_ativo'    => TRUE,
            'categoria_id'     => rand(1, 6),
        ]);

        Produto::create([
            'produto_nome'     => 'Harry Potter eo Prisioneiro de Azkaban',
            'produto_desc'     => 'Descricao Pendente',
            'produto_preco'    => 39,
            'produto_desconto' => 0,
            'produto_ativo'    => TRUE,
            'categoria_id'     => rand(1, 6),
        ]);

        Produto::create([
            'produto_nome'     => 'Harry Potter e a Ôrdem da Fenix',
            'produto_desc'     => 'Descricao Pendente',
            'produto_preco'    => 39,
            'produto_desconto' => 0,
            'produto_ativo'    => TRUE,
            'categoria_id'     => rand(1, 6),
        ]);

        Produto::create([
            'produto_nome'     => 'Harry Potter e o Enigma do Principe',
            'produto_desc'     => 'Descricao Pendente',
            'produto_preco'    => 39,
            'produto_desconto' => 0,
            'produto_ativo'    => TRUE,
            'categoria_id'     => rand(1, 6),
        ]);

        Produto::create([
            'produto_nome'     => 'Harry Potter e as Reliquias da Morte - Parte 1',
            'produto_desc'     => 'Descricao Pendente',
            'produto_preco'    => 39,
            'produto_desconto' => 0,
            'produto_ativo'    => TRUE,
            'categoria_id'     => rand(1, 6),
        ]);

        Produto::create([
            'produto_nome'     => 'Harry Potter e as Reliquias da Morte - Parte 2',
            'produto_desc'     => 'Descricao Pendente',
            'produto_preco'    => 39,
            'produto_desconto' => 0,
            'produto_ativo'    => TRUE,
            'categoria_id'     => rand(1, 6),
        ]);
    }
}
