<h1>Fornecedor</h1>

@isset($fornecedores)
    @forelse($fornecedores as $indices => $fornecedor)

        Fornecedor: {{ $fornecedor['nome'] }} <br>
        Status: {{ $fornecedor['status'] }} <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Dado não foi preenchido'  }} <br>
        Telefone: ({{ $fornecedor['ddd'] }}) {{ $fornecedor['telefone'] }} <br>

        @if($loop->first)
            Primeira iteração do loop
        @endif

        @if($loop->last)
            Última iteração do loop <br>
            Total de registros: {{ $loop->count }}
        @endisset

        <hr>
    @empty
        Não existem fornecedores cadastrados.
    @endforelse
@endisset


