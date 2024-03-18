<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //estilo 1 de criação - instanciação do objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->email = 'fornecedor100@gmail.com';
        $fornecedor->uf = 'CE';
        $fornecedor->site = 'contato@fornecedor100.com.br';
        $fornecedor->save();

        //estilo 2 de criação - metodo create (cuidado com o fillable)
        Fornecedor::create(
            [
                'nome'  => 'Fornecedor101',
                'site'  => 'fornecedor101.com.br',
                'uf'    => 'PR',
                'email' => 'fornecedor101@gmail.com',
            ]);

        //estilo 3 de criação - metodo insert
        DB::table('fornecedores')->insert(
            [
                'nome'  => 'Fornecedor102',
                'site'  => 'fornecedor102.com.br',
                'uf'    => 'SP',
                'email' => 'fornecedor102@gmail.com',
            ]);
    }
}
