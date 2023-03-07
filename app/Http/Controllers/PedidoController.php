<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Cliente;

class PedidoController extends Controller
{

    private $pedido;
    private $cliente;

    public function __construct(Pedido $pedido, Cliente $cliente)
    {
        $this->pedido = $pedido;
        $this->cliente = $cliente;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pedidos = $this->pedido->getPedidos();
        return view('app.pedido.index', ['pedidos'=>$pedidos, 'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = $this->cliente->getAllClientes();
        return view('app.pedido.create', ['clientes'=>$clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "cliente_id"=>"exists:clientes,id"
        ];
        $params = [
            "cliente_id.exists"=>"Cliente informado não existe"
        ];

        $request->validate($rules,$params);
        $cliente_id = $request->all();
        $this->pedido->savePedido($cliente_id);

        return redirect()->route('pedido.index');
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
    public function destroy($id)
    {
        //
    }
}
