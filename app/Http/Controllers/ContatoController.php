<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request){

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request){

        //realizar a validação dos dados do formulário recebidos no request
        //SiteContato::create($request->all());


        //Para a verificação de todos os tipos de validação consulte a biblioteca de validações do laravel
        //https://laravel.com/docs/10.x/validation
        $request->validate([
            'nome'=> 'required|min:3|max:40' , //não pode ser vazio | não pode ser menor que 3 | não pode ser maior que 40
            'telefone'=> 'required',
            'email'=> 'email',
            'motivo_contatos_id'=> 'required',
            'mensagem'=> 'required|max:2000'
        ]);

      
        SiteContato::create($request->all());
        return redirect()->route('principal');

    }
}
