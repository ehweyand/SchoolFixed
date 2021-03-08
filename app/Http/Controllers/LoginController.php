<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller {

    public function index(Request $request) {
        $erro = '';
        //Recupera atributo do request, que poderia ser enviado tanto por post ou get
        if ($request->get('erro') == 1) {
            $erro = 'Usuário ou senha não existem!';
        }

        //Usuário tenta acessar uma rota protegida direto no navegador
        if ($request->get('erro') == 2) {
            $erro = 'Necessário realizar o login para ter acesso a página.';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }




    public function autenticar(Request $request) {
        //Regras de validação
        $regras = [
            'email' => 'email',
            'senha' => 'required'
        ];

        //As mensagens de feedback de validação
        $feedback = [
            'email.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório.'
        ];

        //Se não passar pelo validate, é feito um redirect para a rota antiga.
        $request->validate($regras, $feedback);
        // Se falhar no validate, ai sim o old('email') funcionará no form

        $email = $request->get('email');
        $senha = $request->get('senha');

        $user = new User();
        $existe = $user->where('email', $email)->where('senha', $senha)->get();
        $usuario = $existe->first();

        $usuario = $existe->first();
        if (isset($usuario->nome)) { //Tem um objeto na primeira posição com o atributo name
            //Armazena as informações do usuário logado na sessão.
            session_start();
            $_SESSION['nome'] = $usuario->nome;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]); // Utiliza o verbo get, envia param avisando que deu erro

        }
    }
}
