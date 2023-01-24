<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


class ProdutoDetalhe extends Model
{
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    public function inserirDetalhe($data){
        ProdutoDetalhe::fill($data)->save();
    }

    public function buscarDetalhesPorID($id){
        return ProdutoDetalhe::with(['produto'])->find($id);
    }

    public function updateProdutoDetalhe(Request $request){
       $produto_detalhe = ProdutoDetalhe::find($request->get('produto_id'));
       $produto_detalhe->update($request->all());
    }

    public function produto(){
        return $this->belongsTo('App\Produto');
    }
}
