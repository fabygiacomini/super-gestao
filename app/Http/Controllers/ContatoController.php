<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContatoFormRequest;
use App\Models\MotivoContato;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato()
    {
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(ContatoFormRequest $request)
    {

        // cria um objeto e insere no banco com os dados recuperados do formulário
        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
