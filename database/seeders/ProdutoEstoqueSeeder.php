<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProdutoEstoque;

class ProdutoEstoqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProdutoEstoque::create([
            'produto_id'  => 1,
            'produto_qtd' => 30,
        ]);

        ProdutoEstoque::create([
            'produto_id'  => 2,
            'produto_qtd' => 30,
        ]);

        ProdutoEstoque::create([
            'produto_id'  => 3,
            'produto_qtd' => 30,
        ]);

        ProdutoEstoque::create([
            'produto_id'  => 4,
            'produto_qtd' => 30,
        ]);

        ProdutoEstoque::create([
            'produto_id'  => 5,
            'produto_qtd' => 30,
        ]);

        ProdutoEstoque::create([
            'produto_id'  => 6,
            'produto_qtd' => 30,
        ]);

        ProdutoEstoque::create([
            'produto_id'  => 7,
            'produto_qtd' => 30,
        ]);
    }
}
