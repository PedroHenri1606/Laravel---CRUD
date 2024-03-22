<form action={{ route('contato')}} method="post">
    @csrf  {{-- Comando usado para gerar token CSRF, criando uma barreira de segurança que evita ataques CSRF a aplicação--}}
        
        <input name ="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="{{ $classe }}"> 
            @if($errors->has('nome'))
                {{ $errors->first('nome')}}  {{-- Utilziando operador if convencional --}}
            @endif()
        <br>

        <input name ="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{ $classe }}">
            {{ $errors->has('telefone') ? $errors->first('telefone') : ''}}  {{-- Utilizando operador if ternario --}}
        <br>

        <input name ="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{ $classe }}"> {{-- Foi p assado a variação de estilo como parametro atráves de um array associativo gerado na view --}}
            {{ $errors->has('email') ? $errors->first('email') : ''}}  
        <br>

        <select name ="motivo_contatos_id" class="{{ $classe }}">
            <option value="">Qual o motivo do contato?</option> 
                @foreach($motivo_contatos as $indice => $motivo_contato)
                    <option value="{{$motivo_contato->id}}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}</option>
                @endforeach
        </select>
            {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : ''}}  
        <br>

        <textarea name ="mensagem" class="{{ $classe }}"> {{ (old('mensagem') !=  '') ? old('mensagem') : 'Preencha aqui a sua mensagem'}} </textarea>
            {{ $errors->has('mensagem') ? $errors->first('mensagem') : ''}}  
        <br>
        <button type="submit" class="{{ $classe }}">ENVIAR</button>

    {{ $slot }} {{-- Aqui é onde sera renderizado todos os parametros HTML que é incluido dentro do bloco component dentro da view--}}
</form>