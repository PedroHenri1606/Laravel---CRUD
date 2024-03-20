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
        $validation=
            [
            'nome'=> 'required|min:3|max:40' , //não pode ser vazio | não pode ser menor que 3 | não pode ser maior que 40
            'telefone'=> 'required',
            'email'=> 'email',
            'motivo_contatos_id'=> 'required',
            'mensagem'=> 'required|max:2000'
            ];

            //Caso não passe pelas validações, retorna as mensagens de erro condizente ao usuario
        $mensagensValidation= 
            [
            'nome.required' => "Nome é um campo obrigatorio!" , 
            'nome.min' => 'Nome deve ter no minimo 3 caracteres',
            'nome.max' => 'Nome não pode conter mais de 40 caracteres',

            'telefone.required' => "Telefone é um campo obrigatorio!",


            'email.email' => "Informe um email valido!",


            'motivo_contatos_id.required' => "Motivo do contato é um campo obrigatorio!",


            'mensagem.required' => "Mensagem é um campo obrigatorio",

            //Atribui a mensagem a todos os campos que possuirem a validação 'required'
            'required' => 'O campo :attribute deve ser preenchido', // -> ao utilizar :attribute, sera colocado o nome do campo no retorno da mensagem de erro
            ];

        $request->validate($validation, $mensagensValidation);
      
        SiteContato::create($request->all());
        return redirect()->route('principal');

    }
}
