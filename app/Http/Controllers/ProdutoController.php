<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdicionarProdutoFormRequest;
use App\Models\Fornecedor;
use App\Models\Item;
use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Item::with(['produtoDetalhe', 'fornecedor'])->paginate(10); // 'produtoDetalhe' refere-se ap método de relacionamento definido no model Produto (e Item)
        // o uso do método de relacionamento incita o eager loading ao invés o lazy loading (padrão), trazendo os dados do relacionamento sem precisar explicitamente chamar o método
        // no momento do uso dos objetos retornados


//        Nada disso é necessário quando usamos o hasOne() na Model Produto, indicando o relacionamento com ProdutoDetalhe
//        foreach ($produtos as $key => $produto) {
//            $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();
//            if (isset($produtoDetalhe)) {
//                $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
//                $produtos[$key]['largura'] = $produtoDetalhe->largura;
//                $produtos[$key]['altura'] = $produtoDetalhe->altura;
//            }
//        }

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['produto' => null, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdicionarProdutoFormRequest $request)
    {
        Item::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Item $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
//        return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(AdicionarProdutoFormRequest $request, Item $produto)
    {
        // $request->all(); -> payload
        // $produto -> instância do objeto no estado anterior (antes de atualizar / da forma que está no banco)
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Item $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
