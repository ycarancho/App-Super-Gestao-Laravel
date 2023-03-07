<?php

namespace App;

use Facade\FlareClient\Http\Client;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nome'];
    public function getClientes(){
        return Cliente::paginate(10);
    }

    public function getAllClientes(){
        return Cliente::all();
    }

    public function salvarCliente($data){
        Cliente::fill($data)->save();
    }
}
