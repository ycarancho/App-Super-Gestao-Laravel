<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{

    private $user;

    public function __construct(User $User)
    {
        $this->user = $User;
    }

    public function index(Request $request){
        $erro= '';

        if($request->get('erro') == 1){
            $erro = 'Usuário e/ou senha não existem';
        }else if($request->get('erro') == 2){
            $erro = 'Faça login, para acessar este recurso!';
        }
        
        return view('site.login', ['titulo'=>'Login', 'erro'=> $erro]);
    }

    public function auth(Request $request){
       $rules = [
        "usuario"=>"email",
        "senha"=>"required",
       ];

       $mensage =[
        "usuario.email"=> "Email invalido",
        "senha.required"=> "Preencha o campo",
       ];

       $request->validate($rules,$mensage);

       $email = $request->get('usuario');
       $password = $request->get('senha');

       $usuario = $this->user->verifyUser($email,$password);
       
       if(isset($usuario->name)){
        session_start();
        $_SESSION['nome'] = $usuario->name;
        $_SESSION['email'] = $usuario->email;
        return redirect()->route('app.home');
       }else{
        return redirect()->route('site.login', ['erro'=>1]);
       }
       
       
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
