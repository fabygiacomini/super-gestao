<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdicionarFornecedorFormRequest;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(3); // registros por página

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(AdicionarFornecedorFormRequest $request)
    {
        $msg = '';
        // inserção
        if (!empty($request->input('_token')) && $request->input('id') == '') {

            Fornecedor::create($request->all());

            $msg = 'Cadastro realizado com sucesso';
        }

        // edição
        if (!empty($request->input('_token')) && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));

            $update = $fornecedor->update($request->all());

            if ($update) {
                $msg = 'Atualização realizada com sucesso';
            } else {
                $msg = 'Erro ao tentar atualizar o registro';
            }

            return redirect()->route('app.fornecedor.editar', ['msg' => $msg, 'id' => $request->input('id')]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '')
    {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id)
    {
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');
    }
}
