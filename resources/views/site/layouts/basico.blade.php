<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('titulo')</title> {{-- Comando utilizado para indicar qual section recebera o titulo do arquivo por parametro --}}
        <meta charset="utf-8">

        <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
    </head>

    <body>
        @yield('conteudo') {{-- Comando utilizado para indicar para o template extendido, onde a section devera ser renderizada --}}
    </body>

</html>