<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido_Produto extends Model
{
    protected $table = 'pedidos_produtos';

    public function salvarPedidoProduto($pedido_id, $produto_id){
        $pedido_produto = new Pedido_Produto();
        $pedido_produto->pedidos_id = $pedido_id;
        $pedido_produto->produto_id = $produto_id;
        $pedido_produto->save();
    }
}
