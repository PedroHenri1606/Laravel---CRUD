<?php

use App\Http\Middleware\AutenticacaoMiddleware;
use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;

/*Comando de endereçamento de rotas 
    Get = Tipo de requisição
    o caminho tela na uri
    aonde se localiza o controlador nos arquivos do projeto
    o nome da função que deve ser executada dentro do controlador
    o nome que foi atribuido a rota (boa pratica)
*/

//Com o middleware, antes de ser liberado a rota solicita, sera interceptado pelo middleware e manipulado conforme necessidade 
Route::middleware(LogAcessoMiddleware::class)  // Estilo de criação 1
    ->get('/', [\App\Http\Controllers\PrincipalController::class,'principal'])
    ->name('principal');

//Rotas Contato

Route::get('/contato', [\App\Http\Controllers\ContatoController::class,'contato'])
    ->name('contato')
    ->middleware(LogAcessoMiddleware::class); //Estilo de criação 2

Route::post('/contato', [\App\Http\Controllers\ContatoController::class,'salvar'])->name('contato');

Route::middleware(LogAcessoMiddleware::class)
    ->get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos'])
    ->name('sobreNos');

Route::get('/login', function(){ return 'login';})->name('login');

//Comando prefix utilizado para gerar uma rota pai e endereçar rotas filhas levando o nome da rota pai no começo da uri
Route::middleware('autenticacao:padrao,pedro') // Apos atribuir um apelido ao Middleware em /bootstrap/app.php, é passado o tipo de autenticação por parametro para o Middleware
    ->prefix('/app')
    ->group(function() {
        Route::get('/clientes', function(){ return 'Clientes';})
            ->name('clientes');

        Route::get('/fornecedores', [\App\Http\Controllers\FornecedorController::class, 'fornecedores'])
            ->name('fornecedores');

        Route::get('/produtos', function(){ return 'Produtos';})
            ->name('produtos');
});

Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('teste');

//Comando fallback é utilizado para a aplicação fazer o tratamento quando o usuario informar uma uri invalida
Route::fallback(
    function(){
        echo 'A rota acessada não existe!. <a href=' .route('principal'). '>  clique aqui para ser redirecionado </a>';
    }
);