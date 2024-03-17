<h3>Fornecedor</h3>

{{-- Comentário do BLADE --}}
 
    {{-- comando count faz a contagem de indices do array informado--}}
    @if (count($fornecedores) > 0 && count($fornecedores) < 10)
        <h3>Existem alguns fornecedores cadastrados</h3>
            
            @elseif(count($fornecedores) > 10 )
                <h3>Existem vários fornecedores cadastrados</h3>
        
            @else
                <h3>Não existe nenhum fornecedor cadastrado</h3>        
    @endif

    @if($fornecedores[0]['status'] == 'N')  {{-- Comparador if => se a resposta for true execute --}}
        <p> Forncedor inativo </p>
    @endif

    @unless($fornecedores[0]['status'] == 'S') {{-- Comparador unless => se a resposta for false execute --}}
        <p> Forncedor inativo </p>
    @endunless


    @for($i = 0; $i < count($fornecedores); $i++)   
        @isset($fornecedores)   {{-- verifica se a variavel existe - se sim, ela é exibida, se não, ela não é exibida, sem interromper o funcionamento do código --}} 
            Fornecedor: {{ $fornecedores[$i]['nome'] }}
            <br>
            Status: {{ $fornecedores[$i]['status'] }}
            <br>
            CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Dado não foi preenchido' }}
            <br>
            Telefone: {{ $fornecedores[$i]['ddd'] ?? ''}} {{ $fornecedores[0]['telefone'] ?? ''}}

            @switch($fornecedores[$i]['ddd'])
                @case('11')
                    São Paulo - SP
                    @break
                @case('45')
                    Foz do Iguaçu - Pr
                    @break
                @case('32')
                    Juiz de Fora - Mg
                    @break
                @default
                    Estado não identificado
            @endswitch
            <hr>
        @endisset
        <br>
    @endfor


    @php 
    $i = 0 
    @endphp

    @while(isset($fornecedores[$i])) {{-- isset vai verificar a existencia do indice no array fornecedores, se o indice não existir, vai interromper o loop --}}
        <br>
        Fornecedor: {{ $fornecedores[$i]['nome'] ?? 'Fornecedor não foi preenchido'}} <br> {{-- o caractere ?? é utilizado para definir um valor default a uma variavel--}}
        Status:     {{ $fornecedores[$i]['status'] ?? 'Status não foi preenchido'}} <br>
        CNPJ:       {{ $fornecedores[$i]['cnpj'] ?? 'CNPJ não foi preenchido '}}  <br>
        Telefone:   {{ $fornecedores[$i]['ddd'] ?? 'DDD não foi preenchido'}} {{ $fornecedores[$i]['telefone'] ?? 'Telefone não foi preenchido'}}

        @switch($fornecedores[$i]['ddd'])
            @case('11')
                São Paulo - SP
                @break
            @case('45')
                Foz do Iguaçu - Pr
                @break
            @case('32')
                Juiz de Fora - Mg
                @break
            @default
                Estado não identificado
        @endswitch
        
        <hr>

        @php 
        $i++
        @endphp
    @endwhile

    
    @foreach($fornecedores as $indice => $fornecedor)
        <br>
        Fornecedor: {{ $fornecedor['nome'] ?? 'Fornecedor não foi preenchido'}} <br>
        Status:     {{ $fornecedor['status'] ?? 'Status não foi preenchido'}} <br>
        CNPJ:       {{ $fornecedor['cnpj'] ?? 'CNPJ não foi preenchido '}}  <br>
        Telefone:   {{ $fornecedor['ddd'] ?? 'DDD não foi preenchido'}} {{ $fornecedor['telefone'] ?? 'Telefone não foi preenchido'}}

        @switch($fornecedor['ddd'])
            @case('11')
                São Paulo - SP
                @break
            @case('45')
                Foz do Iguaçu - Pr
                @break
            @case('32')
                Juiz de Fora - Mg
                @break
            @default
                Estado não identificado
        @endswitch

        <hr>
    @endforeach


    @forelse($fornecedores as $indice => $fornecedor) {{-- Tem o seu funcionamento igual o foreach, porem caso o array esteja vazio, ele executa o comando empty --}}
        <br>

        {{-- @dd($loop) / O comando @dd serve para a impressão dos atributos do objeto ou variavel na tela --}}
        
        @if($loop->first)
            Primeira interação <br>
        @endif
        
        Indice: {{ $loop->iteration }} <br> {{-- Objeto loop esta presente dentro das funções foreach e forelse, nela é possivel extrair varios dados, um deles, a interação atual --}}
        Fornecedor: @{{ $fornecedor['nome'] ?? 'Fornecedor não foi preenchido'}} <br> {{-- Você pode utilizar o @ para fazer o blade não ler os comandos de impressão do Blade--}}
        Status:     {{ $fornecedor['status'] ?? 'Status não foi preenchido'}} <br>
        CNPJ:       {{ $fornecedor['cnpj'] ?? 'CNPJ não foi preenchido '}}  <br>
        Telefone:   ({{ $fornecedor['ddd'] ?? 'DDD não foi preenchido'}}) {{ $fornecedor['telefone'] ?? 'Telefone não foi preenchido'}}

        @switch($fornecedor['ddd'])
            @case('11')
                São Paulo - SP
                @break
            @case('45')
                Foz do Iguaçu - Pr
                @break
            @case('32')
                Juiz de Fora - Mg
                @break
            @default
                Estado não identificado
        @endswitch
        <hr>
        
        @empty Não existem fornecedores cadastrados!
    @endforelse
