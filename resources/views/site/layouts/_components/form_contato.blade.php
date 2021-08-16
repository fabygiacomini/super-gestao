{{ $slot }} {{-- inclui os dados passados pelas views dentro dos comandos @component e @endcomponent quando chamado este componente --}}
<form action="{{ route('site.contato') }}" method="post">
    @csrf {{-- todos os forms enviados por post precisam de um token - que é gerado usando esse comando--}}
    <input name="nome" type="text" placeholder="Nome" class="{{ $classe }}"> {{-- usamos a variável passada no array associativo do @component --}}
    <br>
    <input name="telefone" type="text" placeholder="Telefone" class="{{ $classe }}">
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{ $classe }}">
    <br>
    <select name="motivo_contato" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea name="menssagem" class="{{ $classe }}">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>
