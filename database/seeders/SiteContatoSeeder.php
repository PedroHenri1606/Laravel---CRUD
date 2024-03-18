<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contato = new SiteContato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(11) 1111-1111';
        $contato->email = 'contato@sg.com.br';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Seja bem vindo ao sistema Super Gestão!';
        $contato->save();

        //Como na Model não foi ativado o fillable, não é possivel a utilização do metodo create
    }
}
