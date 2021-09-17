@if($cliente && $cliente->id) {{-- verificamos se é para atualizar ou criar um registro --}}
<form method="post" action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}">
    @method('PUT')
    @csrf
    @else
        <form method="post" action="{{ route('cliente.store') }}">
            @csrf
            @endif


            <input type="hidden" name="id" value="">
            {{-- a variável $fornecedor é recebida quando chegamos na view por meio da edição de um fornecedor da lista --}}
            <input type="text" name="nome" value="{{ $cliente->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
            {{ $errors->has('nome') ? $errors->first('nome') : '' }}

            <button type="submit" class="borda-preta">
                @if($cliente && $cliente->id)
                    Editar
                @else
                    Cadastrar
                @endif
            </button>
        </form>
