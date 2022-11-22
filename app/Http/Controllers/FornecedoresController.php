<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedoresController extends Controller
{
    private $fornecedor;
    public function __construct(Fornecedor $fornecedor)
    {
        $this->fornecedor = $fornecedor;
    }
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listarFornecedores(Request $request){
        try {
            $fornecedores = $this->fornecedor->listarFornecedores($request);
            return view('app.fornecedor.listar', ['fornecedores'=>$fornecedores, 'request'=> $request->all()]);
        } catch (\Exception $th) {
            echo $th->getMessage();
        }
    }

    public function editar($id, $msg= ''){
        $fornecedor = $this->fornecedor->consultaViaId($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg'=> $msg]);
    }

    public function adicionarFornecedor(Request $request){
       try {
        $regras=[
            "nome"=>"required|min:3|max:40",
            "site"=>"required|max:50",
            "uf"=>"required|min:2|max:2",
            "email"=>"email",
        ];
        $feedback=[
            "required"=> "O campo :attribute é necessário !",
            "nome.min"=> "O minimo requirido para um nome são 3 caracteres.",
            "nome.max"=> "O máximo requirido para um nome são 40 caracteres.",
            "site.max"=> "O máximo requirido para um site são 50 caracteres.",
            "uf.min"=>"O minimo requirido para uma UF são 2 caracteres.",
            "uf.max"=>"O máximo requirido para uma UF são 2 caracteres.",
            "email.email"=>"O email foi preenchido de forma incorreta.",
        ];
        $request->validate($regras, $feedback);
        if($request->get('_token') != '' && $request->get('id') == ''){
            $dados = $request->all();
            $this->fornecedor->adcionar($dados);
            $msg = "Fornecedor cadastrado com sucesso !";


            return redirect()->route('app.fornecedor.adicionar', ['msg'=> $msg]);

        }else if($request->get('_token') != '' && $request->get('id') != '' ){
            $request->all();
            $retorno = $this->fornecedor->atualizarUsuario($request);
            if($retorno){
                $msg ="Usuario atualizado com sucesso";
            }else{
                $msg ="Erro no processo de atualização, contate o suporte";
            }
            return redirect()->route('app.fornecedor.editar', ['id'=>$request->get('id'), 'msg'=> $msg] );
        }
        
       } catch (\Exception $th) {
        echo $th->getMessage();
       }
    }


    public function adicionar(){
        return view('app.fornecedor.adicionar');
    }

    public function excluir($id){
        try {
           $retorno =  $this->fornecedor->excluir($id);
            if ($retorno) {
                return redirect()->route('app.fornecedor');
            }
        } catch (\Exception $th) {
            echo $th->getMessage();
        }
    }
}
