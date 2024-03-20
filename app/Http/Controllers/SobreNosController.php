<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreNosController extends Controller
{
    /*  --Recurso disponivel em versões antigas do Laravel, na versão 11x, não é possivel a utilização em construtor
    // Atualmente se utiliza 1 Middleware para requisição e 1 Middleware para resposta
    public function __construct(){
        $this->middleware(LogAcessoMiddleware::class);
    }
    */

    public function sobreNos(){
        return view('site.sobreNos');
    }
}
