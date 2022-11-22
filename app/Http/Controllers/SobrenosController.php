<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class SobrenosController extends Controller
{
    public function sobrenos (){
        return view('site.sobre-nos', ['titulo' => 'Sobre Nós']);
    }
}
