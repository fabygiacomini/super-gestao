@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>

        @include('app.layouts._partials.appmenu')

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">

                {{ $msg }} {{-- mensagem de sucesso após inclusão --}}

                <form method="post" action="{{ route('app.fornecedor.adicionar') }}">
                    @csrf
                    <input type="text" name="nome" value="{{ old('nome') }}" placeholder="Nome" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input type="text" name="site" value="{{ old('site') }}" placeholder="Site" class="borda-preta">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}

                    <input type="text" name="uf" value="{{ old('uf') }}" placeholder="UF" class="borda-preta">
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}

                    <input type="text" name="email" value="{{ old('email') }}" placeholder="E-mail" class="borda-preta">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection
