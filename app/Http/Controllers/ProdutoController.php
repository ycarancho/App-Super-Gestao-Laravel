<?php

namespace App\Http\Controllers;

use App\Produto;
use App\ProdutoDetalhe;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private $produto;
    private $unidade;
    private $produtoDetalhe;
    public function __construct(Produto $produto, Unidade $unidade, ProdutoDetalhe $produtoDetalhe)
    {
        $this->produto = $produto;
        $this->unidade = $unidade;
        $this->produtoDetalhe = $produtoDetalhe;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $produtos = $this->produto->listarProduto();
            return view('app.produtos.index', ['produtos'=>$produtos, 'request'=> $request->all()]);
        } catch (\Exception $th) {
            echo $th->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = $this->unidade->listarUnidades();
        return view('app.produtos.create', ['unidades'=>$unidades]);
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
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:300',
            'peso' => 'required',
            'unidade_id' => 'exists:unidades,id',
        ];
        $params = [
            'required'=>'O campo :attribute é obrigatorio.',
            'nome.min'=>'Minimo de 3 caractéres  para o campo :attribute.',
            'nome.max'=>'Máximo de 40 caractéres atingidos para o campo :attribute.',
            'descricao.min'=>'Minimo de 3 caractéres para o campo :attribute',
            'descricao.max'=>'Máximo de 300 caractéres atingidos para o campo :attribute',
            'unidade_id.exists' => 'Unidade não existe'
        ];
        $request->validate($rules, $params);
        try {  
            $data = $request->all();
            $this->produto->adicionarProduto($data);
            return redirect(route('produto.index'));
        } catch (\Exception $th) {
            echo $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produtos.show', ['produto'=>$produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = $this->unidade->listarUnidades();
        return view('app.produtos.edit', ['produto'=>$produto, 'unidades'=>$unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $produto->update($request->all());
        return view('app.produtos.show', ['produto'=>$produto]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
