@if($produto_detalhe && $produto_detalhe->id) {{-- verificamos se é para atualizar ou criar um registro --}}
<form method="post" action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}">
    @method('PUT')
    @csrf
    @else
        <form method="post" action="{{ route('produto-detalhe.store') }}">
            @csrf
            @endif
            <input type="hidden" name="id" value="">
            {{-- a variável $fornecedor é recebida quando chegamos na view por meio da edição de um fornecedor da lista --}}
            <input type="text" name="produto_id" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" placeholder="ID do Produto" class="borda-preta">
            {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

            <input type="text" name="comprimento" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" placeholder="Comprimento" class="borda-preta">
            {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

            <input type="text" name="largura" value="{{ $produto_detalhe->largura ?? old('largura') }}" placeholder="Largura" class="borda-preta">
            {{ $errors->has('largura') ? $errors->first('largura') : '' }}

            <input type="text" name="altura" value="{{ $produto_detalhe->altura ?? old('altura') }}" placeholder="Altura" class="borda-preta">
            {{ $errors->has('altura') ? $errors->first('altura') : '' }}

            <select name="unidade_id">
                <option>-- Selecione uma Unidade de Medida --</option>

                @foreach($unidades as $unidade)
                    <option value="{{ $unidade->id }}" {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}</option>
                @endforeach
            </select>
            {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

            <button type="submit" class="borda-preta">
                @if($produto_detalhe && $produto_detalhe->id)
                    Editar
                @else
                    Cadastrar
                @endif
            </button>
        </form>
