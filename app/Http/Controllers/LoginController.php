<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){

        $erro = '';

        if($request->get('erro') == 1){
            $erro = 'Usuário ou senha não existem!';
        } 
        else if($request->get('erro') == 2){
            $erro = 'Necessário realizar login para ter acesso a página';
        }

        return view('site.login', ['erro' => $erro]);
    }

    public function autenticar(Request $request){
        
        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required',
        ];

        //as mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'O campo de email do usuário é obrigatório!',
            'senha.required' => 'O campo de senha é obrigatório'
        ];

        //se não passar pelo validate
        $request->validate($regras,$feedback);

        //Recuperando os parametros da requisição
        $email = $request->get('usuario');
        $senha = $request->get('senha');

        //Iniciando o Model User
        $user = new User();

        //Atraves do Eloquente ORM, podemos fazer Query direto no banco
        $usuario = $user->where('email', $email)
                       ->where('password', $senha)
                       ->get()  //get() = para transformar em uma Collection 
                       ->first();  //first() = para pegar o primeiro indice da collection

        if(isset($usuario->name)){
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $email;

            return redirect()->route('app.clientes');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }
}
