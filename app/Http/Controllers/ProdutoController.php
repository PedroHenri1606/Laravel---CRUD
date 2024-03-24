<?php

namespace App\Http\Controllers;

use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;
use App\Models\Produto;


class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(10);

        /* Metodo para a impressão dos dados de produtoDetalhe, sem utilizar o Eloquent ORM hasOne no model Produto 
        foreach ($produtos as $indice => $produto){
            $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();

            if(isset($produtoDetalhe)){

                $produtos[$indice]['comprimento'] = $produtoDetalhe->comprimento;
                $produtos[$indice]['largura'] = $produtoDetalhe->largura;
                $produtos[$indice]['altura'] = $produtoDetalhe->altura;
            } 
        }
        */

        return view('app.produto.index', ['produtos'=> $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $unidades = Unidade::all();
        return view('app.produto.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {
       // Produto::create($request->all()); -> forma 1

       $produto = new Produto();
       
       $nome = $request->get('nome');
       $descricao = $request->get('descricao');
       $unidade_id = $request->get('unidade_id');
       $peso = $request->get('peso');
       
       $nome = strtoupper($nome);

       $produto->nome = $nome;
       $produto->descricao = $descricao;
       $produto->peso = $peso;
       $produto->unidade_id = $unidade_id;

       $validation = [
        'nome'       => 'required|min:3|max:40',
        'descricao'  => 'required|min:3|max:2000',
        'peso'       => 'required|integer',
        'unidade_id' => 'exists:unidades,id', 
       ];

       $feedback = [
        'nome.required'      => 'Nome é um campo obrigatorio!',
        'nome.min'           => 'Nome deve conter pelo menos 3 caracterez!',
        'nome.max'           => 'Nome deve conter até 40 caracterez!',
        
        'descricao.required' => 'Descrição é um campo obrigatorio!',
        'descricao.min'      => 'Descrição deve conter pelo menos 3 caracterez!',
        'descricao.max'      => 'Descrição deve conter até 2000 caracterez!',
        
        'peso.required'      => 'Peso é um campo obrigatorio!',
        'peso.integer'       => 'Informe um valor valido!',

        'unidade_id.exists'  => 'Selecione uma unidade valida!', 

       ];

       $request->validate($validation, $feedback);

       $produto->save(); // -> forma 2 de persistencia 

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $unidades =  Unidade::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $validation = [
            'nome'       => 'required|min:3|max:40',
            'descricao'  => 'required|min:3|max:2000',
            'peso'       => 'required|integer',
            'unidade_id' => 'exists:unidades,id', 
            ];

            $feedback = [
            'nome.required'      => 'Nome é um campo obrigatorio!',
            'nome.min'           => 'Nome deve conter pelo menos 3 caracterez!',
            'nome.max'           => 'Nome deve conter até 40 caracterez!',
            
            'descricao.required' => 'Descrição é um campo obrigatorio!',
            'descricao.min'      => 'Descrição deve conter pelo menos 3 caracterez!',
            'descricao.max'      => 'Descrição deve conter até 2000 caracterez!',
            
            'peso.required'      => 'Peso é um campo obrigatorio!',
            'peso.integer'       => 'Informe um valor valido!',

            'unidade_id.exists'  => 'Selecione uma unidade valida!', 

            ];

            $request->validate($validation, $feedback);

        // forma 1 de edição
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->peso = $request->peso;
        $produto->unidade_id = $request->unidade_id;
        
        //$produto->update($request->all()); --> forma 2 de edição
        $produto->update();

        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produto.index', ['produto'=> $produto->id]);
     }
}
