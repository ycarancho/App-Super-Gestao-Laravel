<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;

class PrincipalController extends Controller
{
    private $motivoContato;

    public function __construct(MotivoContato $motivoContato)
    {
        $this->motivoContato = $motivoContato;
    }
    public function principal(){
        $motivo_contato = $this->buscarMotivoContato();
        return view('site.principal', ['titulo' => 'Home', 'motivo_contato'=>$motivo_contato]);
    }

    public function buscarMotivoContato(){
        try {
            $motivo_contato = $this->motivoContato->buscarMotivoContato();
           return  $motivo_contato;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
