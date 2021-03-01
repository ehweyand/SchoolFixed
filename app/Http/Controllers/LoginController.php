<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function autenticar(Request $request)
    {
        echo "cheguei";
        //Regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //As mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório.'
        ];

        //Se não passar pelo validate, é feito um redirect para a rota antiga.
        $request->validate($regras, $feedback);

        $email = $request->get('email');
        $senha = $request->get('senha');

        $user = new User();
        $existe = $user->where('email', $email)->where('password', $senha)->get();
        $usuario = $existe->first();

        $usuario = $existe->first();
        if (isset($usuario->nome)) { //Tem um objeto na primeira posição com o atributo name
            //Armazena as informações do usuário logado na sessão.
            session_start();
            $_SESSION['nome'] = $usuario->nome;
            $_SESSION['email'] = $usuario->email;

            echo "logou";

        } else {
            return redirect()->route('site.login', ['erro' => 1]); // Utiliza o verbo get, envia param avisando que deu erro
        }
    }
}
