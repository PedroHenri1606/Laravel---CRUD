    <form action={{ route('contato')}} method="post">
        @csrf  {{-- Comando usado para gerar token CSRF, criando uma barreira de segurança que evita ataques CSRF a aplicação--}}
        <input name ="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="{{ $classe }}"> 
        <br>
        <input name ="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{ $classe }}">
        <br>
        <input name ="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{ $classe }}"> {{-- Foi p assado a variação de estilo como parametro atráves de um array associativo 
                                                                                          gerado na view --}}
        <br>
        <select name ="motivo_contato" class="{{ $classe }}">
            <option value="">Qual o motivo do contato?</option>
            <option value="1" {{old('motivo_contato') == 1 ? 'selected' : ''}} >Dúvida</option>
            <option value="2" {{old('motivo_contato') == 2 ? 'selected' : ''}} >Elogio</option>
            <option value="3" {{old('motivo_contato') == 3 ? 'selected' : ''}} >Reclamação</option>
        </select>
        <br>
            <textarea name ="mensagem" class="{{ $classe }}"> {{ (old('mensagem') !=  '') ? old('mensagem') : 'Preencha aqui a sua mensagem'}} </textarea>
        <br>
        <button type="submit" class="{{ $classe }}">ENVIAR</button>

        {{ $slot }} {{-- Aqui é onde sera renderizado todos os parametros HTML que é incluido dentro do bloco component dentro da view--}}
    </form>
