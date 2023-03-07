<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function getPedidos()
    {
        return Pedido::paginate(10);
    }

    public function savePedido($data){
        $pedido = new Pedido();
        $pedido->cliente_id = $data['cliente_id'];
        $pedido->save();
    }

    public function produtos(){
        return $this->belongsToMany('App\Produto', 'pedidos_produtos', 'pedidos_id', 'produto_id');
    }
}
