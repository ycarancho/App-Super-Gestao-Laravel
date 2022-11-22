<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    protected $fillable = ['nome', 'telefone', 'email', 'motivo_contato_id', 'mensagem'];

    public function Salvar_contato($dados)
    {
        SiteContato::fill($dados)->save();
    }
}
