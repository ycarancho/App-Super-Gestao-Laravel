<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Unidade extends Model
{
    protected $fillable = ['unidade','descricao'];

   public function listarUnidades(){
        return Unidade::all();
   }
}
