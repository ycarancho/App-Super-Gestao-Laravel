<?php

namespace App\Http\Controllers;

use App\ProdutoDetalhe;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{

    private $produto_detalhe;
    private $unidade;
    
    public function __construct(ProdutoDetalhe $produto_detalhe, Unidade $unidade)
    {
        $this->produto_detalhe = $produto_detalhe;
        $this->unidade = $unidade;
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
    public function create()
    {
        $unidades = $this->unidade->listarUnidades();
        return view('app.produtoDetalhe.create', ['unidades'=>$unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->produto_detalhe->inserirDetalhe($data);

        echo "Detalhe salvo com sucesso !";
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
        $produto_detalhe = $this->produto_detalhe->buscarDetalhesPorID($id);
        $unidades = $this->unidade->listarUnidades();
        return view("app.produtoDetalhe.edit",['produto_detalhe'=>$produto_detalhe, 'unidades'=>$unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param App\ProdutoDetalhe $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
        $data = $request->all();
        $this->produto_detalhe->updateProdutoDetalhe($request);
        echo 'Produto atualizado';
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
