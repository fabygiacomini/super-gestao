<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';
        if ($request->get('erro') == 1) {
            $erro = 'Usuário e/ou senha não existe!';
        } else if ($request->get('erro') == 2) { // recebido do middleware de Autenticacao
            $erro = 'Necessário realizar login para ter acesso à página';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(LoginFormRequest $request)
    {
        $email = $request->get('usuario');
        $password = $request->get('senha');

        $usuario = User::where('email', $email)->where('password', $password)->first();

        if (isset($usuario->name)) {
            session_start();
            $_SESSION['name'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair()
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
