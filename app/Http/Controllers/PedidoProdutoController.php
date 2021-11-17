<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
//        $pedido->produtos; //eager loading -> relacionamento belongsToMany -> já traz os produtos relacionados ao pedido
        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required'
        ];

        $request->validate($regras);

        /*
        Inserção por meio da tabela de relacionamento pedido_produtos
        $pedidoProduto = new PedidoProduto();
        $pedidoProduto->pedido_id = $pedido->id;
        $pedidoProduto->produto_id = $request->get('produto_id');
        $pedidoProduto->quantidade = $request->get('quantidade');
        $pedidoProduto->save();
        */

        //$pedido->produtos; // método chamado como atributo retorna os registros do relacionamento
        /** Inserção na tabela de relacionamento, por meio do vínculo entre elas, sem usar a model */
        $pedido->produtos() // retorna um objeto
            ->attach($request->get('produto_id'), ['quantidade' => $request->get('quantidade')]);

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Pedido $pedido
     * @param Produto $produto
     * @return \Illuminate\Http\RedirectResponse
     */
//    public function destroy(Pedido $pedido, Produto $produto)
    public function destroy(PedidoProduto $pedidoProduto, $pedido_id)
    {
        // Convencional
//        PedidoProduto::where([
//            'pedido_id' => $pedido->id,
//            'produto_id' => $produto->id
//        ])->delete();

        // Detach (delete por meio do relacionamento)
        //$pedido->produtos()->detach($produto->id); // o id do objeto instanciado já está no contexto, precisando apenas do produto

        // Por meio do PedidoProduto
        $pedidoProduto->delete();
        return redirect()->route('pedido-produto.create', ['pedido' => $pedido_id]);
    }
}
