<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Produto;
use App\Pedido_Produto;

class Pedido_ProdutoController extends Controller
{

    private $pedido;
    private $produto;
    private $Pedido_Produto;

    public function __construct(Pedido $pedido, Produto $produto, Pedido_Produto $pedido_Produto)
    {
        $this->pedido = $pedido;
        $this->produto = $produto;
        $this->Pedido_Produto = $pedido_Produto;
    }
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
        $produtos = $this->produto->listarTodosProdutos();
        return view('app.pedido_produto.create', ['pedido'=>$pedido, 'produtos'=>$produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $rules = [
            "produto_id"=>"exists:produto,id",
            "quantidade"=>"required",
        ];
        $params=[
            "produto_id.exists" => "O produto não existe",
            "quantidade.required" => "O campo :attribute é obrigatorio"
        ];

        $request->validate($rules, $params);
        $pedido_id = $pedido->id;
        $produto_id = $request->get('produto_id');
        $quantidade = $request->get('quantidade');
        $pedido->produtos()->attach($produto_id, ['quantidade'=> $quantidade]);
        // $this->Pedido_Produto->salvarPedidoProduto($pedido_id, $produto_id);
        return redirect()->route('pedido-produto.create', ['pedido'=>$pedido->id]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido_Produto $pedidoProduto, $pedido)
    {
     
        /* Convencional*/
        // Pedido_Produto::where([
        //     'pedido'=>$pedido->id,
        //     'produto'=>$produto->id
        // ])->delete();

        // $pedido->produtos()->detach($produto->id);
        $pedidoProduto->delete();
        return redirect()->route('pedido-produto.create', ['pedido'=>$pedido]);
    }
}
