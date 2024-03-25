    @extends('app.layouts.basico')

    @section('titulo', 'Produto')

    @section('conteudo')
    
        <div class = "conteudo-pagina">
            <div class = "titulo-pagina2">
                <p>Produto - Listar</p>
            </div>

            <div class="menu"> 
                <ul>
                    <li><a href=" {{ route('produto.create') }}"> Novo </a></li>
                    <li><a href=" "> Consulta </a></li>
                </ul>
            </div>

            <div class="informacao-pagina">
                <div style="width: 90%; margin-left: auto; margin-right: auto;">
                    <table style = "width: 100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Peso</th>
                                <th>Unidade ID</th>   
                                <th>Largura</th>   
                                <th>Comprimento</th>   
                                <th>Altura</th>
                                <th>Visualizar</th>
                                <th>Excluir</th>
                                <th>Editar</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($produtos as $produto)
                                <tr>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ $produto->descricao }}</td>
                                    <td>{{ $produto->peso }}</th>
                                    <td>{{ $produto->unidade_id }}</td>
                                    <td>{{ $produto->itemDetalhe->comprimento ?? '' }}</td>
                                    <td>{{ $produto->itemDetalhe->largura ?? '' }}</td>
                                    <td>{{ $produto->itemDetalhe->altura ?? '' }}</td>
                                    <td><a href=" {{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                                    <td>
                                        <form id="form_{{$produto->id}}" method="post" action ="{{ route('produto.destroy', ['produto' => $produto->id]) }}"> 
                                            @method('DELETE')
                                            @csrf
                                            <!-- <button type="submit"> Excluir </button> -->
                                            <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir </a> 
                                        </form>
                                    </td> 
                                    <td><a href=" {{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination">
                        {{ $produtos->appends($request)->links()}}
                            <br>
                        {{ $produtos->total()}}
                    </div>
                </div>
            </div>  
        </div>
    @endsection