<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){

        $erro = '';

        if($request->get('erro') == 1){
            $erro = 'Usuário e senha não existem';
        }

        if($request->get('erro') == 2){
            $erro = 'Necessário realizar login para ter acesso à página.';
        }        
        
        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);

    }

    public function autenticar(Request $request){
        
        // regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();

        $usuario = $user->where('email', $email)
                    ->where('password', $password)
                    ->get()
                    ->first();

        if(isset($usuario->name)){

            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.cliente');
            
        } else {

            return redirect()->route('site.login', ['erro' => 1 ]);
        }

    }

    public function sair (){
        session_destroy();

        return redirect()->route('site.index');
    }
}
