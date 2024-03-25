@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    
    <div class = "conteudo-pagina">
        <div class = "titulo-pagina2">
            <p>Produto Detalhes - Editar</p>
        </div>

        <div class="menu"> 
            <ul>
                <li><a href=" {{ route('produto.index') }} "> Voltar </a></li>
                <li><a href=" "> Consulta </a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{ $produto_detalhe->toJson() }}

            <h4> Produto </h4>
                <div>Nome: {{ $produto_detalhe->item->nome }}</div>
                <br>
                <div>Descrição: {{  $produto_detalhe->item->descricao }}</div>   
    
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.produto_detalhe._components.form_create_edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades])
                @endcomponent
            </div>
        </div>  
    </div>
@endsection