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
            ->get();

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

    public function adicionar(AdicionarFornecedorFormRequest $request)
    {
        $msg = '';
        if (!empty($request->input('_token'))) {

            Fornecedor::create($request->all());

            $msg = 'Cadastro realizado com sucesso';
        }
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
}
