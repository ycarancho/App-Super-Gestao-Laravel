<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotivoContato extends Model
{
    
    public function buscarMotivoContato(){
        $motivo_contato = MotivoContato::all();
        return $motivo_contato;
    }
}
