<?php

use App\Http\Middleware\AutenticacaoMiddleware;
use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;


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

Route::post('/contato', [\App\Http\Controllers\ContatoController::class,'salvar'])
    ->name('contato');

Route::middleware(LogAcessoMiddleware::class)
    ->get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos'])
    ->name('sobreNos');

Route::get('/login/{erro?}', [\App\Http\Controllers\LoginController::class, 'index'])
    ->name('site.login'); 
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'autenticar'])
    ->name('site.login'); //boa pratica sempre colocar o nome do pacote que ela se encontra no começo do nome

//Comando prefix utilizado para gerar uma rota pai e endereçar rotas filhas levando o nome da rota pai no começo da uri
Route::middleware('autenticacao:padrao,pedro') // Apos atribuir um apelido ao Middleware em /bootstrap/app.php, é passado o tipo de autenticação por parametro para o Middleware
    ->prefix('/app')
    ->group(function() {
        Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])
            ->name('app.home');
        
        Route::get('/sair', [\App\Http\Controllers\LoginController::class, 'sair'])
            ->name('app.sair');
        
        Route::get('/cliente', [\App\Http\Controllers\ClienteController::class, 'index'])
            ->name('app.cliente');

        Route::get('/fornecedor', [\App\Http\Controllers\FornecedorController::class, 'fornecedores'])
            ->name('app.fornecedor');

        Route::post('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class, 'listar'])
            ->name('app.fornecedor.listar');

        Route::get('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class, 'listar'])
            ->name('app.fornecedor.listar');    

        Route::get('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class, 'adicionar'])
            ->name('app.fornecedor.adicionar');

        Route::post('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class, 'adicionar'])
            ->name('app.fornecedor.adicionar');

        Route::get('/fornecedor/editar/{id}/{msg?}', [\App\Http\Controllers\FornecedorController::class, 'editar'])
            ->name('app.fornecedor.editar');
            
        Route::get('/fornecedor/excluir/{id}', [\App\Http\Controllers\FornecedorController::class, 'excluir'])
            ->name('app.fornecedor.excluir');

        

        Route::resource('produto', ProdutoController::class);
        
});

Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'teste'])
    ->name('teste');

//Comando fallback é utilizado para a aplicação fazer o tratamento quando o usuario informar uma uri invalida
Route::fallback(
    function(){
        echo 'A rota acessada não existe!. <a href=' .route('principal'). '>  clique aqui para ser redirecionado </a>';
    }
);