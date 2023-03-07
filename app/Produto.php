<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';
    protected $fillable = ['nome','descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function produtoDetalhe(){
        return $this->hasOne('App\ProdutoDetalhe');
    }
    
    public function listarProduto()
    {
        $produto = Produto::with('produtoDetalhe', 'fornecedor')->paginate(10);

        return $produto;
    }

    public function adicionarProduto($data){
        Produto::fill($data)->save();
    }

    public function listarTodosProdutos(){
        return Produto::all();
    }

    public function fornecedor(){
        return $this->belongsTo('App\fornecedor');
    }

    public function pedidos(){
        return $this->belongsToMany('App\Pedido', 'pedidos_produtos', 'produto_id', 'pedidos_id');
    }

}
