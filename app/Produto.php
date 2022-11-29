<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';
    protected $fillable = ['nome','descricao', 'peso', 'unidade_id'];


    public function listarProduto()
    {
        $produto = Produto::paginate(10);

        return $produto;
    }

    public function adicionarProduto($data){
        Produto::fill($data)->save();
    }
}
