<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use PhpParser\Node\Stmt\Catch_;

class ClienteController extends Controller
{
    private $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = $this->cliente->getClientes();
        return view('app.cliente.index', ['clientes'=>$clientes, 'request'=>$request->all()]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =[
            "nome"=>"required|min:3|max:40"
        ];

        $feedback =[
            "required"=>"O campo :attribute é obrigatorio",
            "nome.min"=>"O minimo de caracteres é 3",
            "nome.max"=>"O maximo de caracteres é 40",
        ];

        $request->validate($rules,$feedback);

        try{
            $data = $request->all();
            $this->cliente->salvarCliente($data);
            return redirect()->route('cliente.index');
        }catch(\Exception $ex){
            echo $ex->getMessage();
        }

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
