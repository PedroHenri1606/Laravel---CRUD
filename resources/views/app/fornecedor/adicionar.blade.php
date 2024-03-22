@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    
    <div class = "conteudo-pagina">
        <div class = "titulo-pagina2">
            <p>Fornecedor - Adicionar</p>
        </div>

        <div class="menu"> 
            <ul>
                <li><a href=" {{ route('app.fornecedor.adicionar') }}"> Novo </a></li>
                <li><a href=" {{ route('app.fornecedor') }}"> Consulta </a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action=" {{ route('app.fornecedor.adicionar') }}" method="post">
                    @csrf

                    <input type="hidden" name="id" value="{{ $fornecedor->id ?? ''}}">

                    <input type="text" name="nome" value="{{ $fornecedor->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
                        {{ $errors->has('nome') ? $errors->first('nome') : ''}}  
                    <br>

                    <input type="text" name="site" value="{{ $fornecedor->site ?? old('site') }}" placeholder="Site" class="borda-preta">
                        {{ $errors->has('site') ? $errors->first('site') : ''}}
                    <br>

                    <input type="text" name="uf" value="{{ $fornecedor->uf ?? old('uf') }}" placeholder="UF" class="borda-preta">
                        {{ $errors->has('uf') ? $errors->first('uf') : ''}}
                    <br>
                    
                    <input type="text" name="email" value="{{ $fornecedor->email ?? old('email') }}" placeholder="Email" class="borda-preta">
                        {{ $errors->has('email') ? $errors->first('email') : ''}}
                    <br>

                        {{ $msg ?? '' }} {{-- se estiver setada, utilize, se não, não utilize--}}
                    <button type="submit" class="borda-preta"> Adicionar </button>
                </form>
            </div>
        </div>  
    </div>
@endsection