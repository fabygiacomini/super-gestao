@if(isset($pedido->id)) {{-- verificamos se é para atualizar ou criar um registro --}}
    <form method="post" action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}"> {{-- faz o update --}}
        @csrf
        @method('PUT')
@else {{-- faz a inserção de um novo pedido --}}
    <form method="post" action="{{ route('pedido.store') }}">
        @csrf
@endif
    <select name="cliente_id">
        <option>-- Selecione um Cliente --</option>

        @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}" {{ ($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
        @endforeach
    </select>

    {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}

    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
