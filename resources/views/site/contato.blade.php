@extends('site.layouts.basico') {{-- Comando utilizado para determinar qual template sera utilizado na view--}}

@section('titulo', 'Contato') {{-- Nesse exemplo o comando section foi utilizado para definir o titulo da página, não sendo necessario fechar o bloco section --}}
                              {{-- O primeiro parametro se refere a seção que esta presente no layout, o segundo se refere ao titulo da página   --}}

@section('conteudo')  {{-- Comando utilizado para envio dos blocos de codigo html para o template extendido --}}
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal"> 
                @component('site.layouts._components.form_contato', ['classe' => 'borda-preta', 'motivo_contatos' => $motivo_contatos]) 
                                                                                                    {{-- Comando utilizado para gerar um componente para ser 
                                                                                                         utilizado nas views, diferente do método include, um
                                                                    criado um array associativo          Componente, pode receber parametros html, esses 
                                                                    que sera usado como variavel         parametros sendo renderizados atráves da variavel 
                                                                    dentro do component                  $slot dentro do componente --}}
                    <p> A nossa equipe analisara a sua mensagem, e retornaremos o mais breve possivel </p>
                    <p> Nosso tempo médio de resposta é de 48 horas </p>
                @endcomponent
            </div>
        </div>  
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png')}}">
            <img src="{{ asset('img/linkedin.png')}}">
            <img src="{{ asset('img/youtube.png')}}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png')}}">
        </div>
    </div>
@endsection {{-- Comando utilizado para fechar o bloco de codigo section --}}