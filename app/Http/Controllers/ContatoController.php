<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    private $siteContato;
    private $motivoContato;

    public function __construct(SiteContato $siteContato, MotivoContato $motivoContato)
    {
        $this->siteContato = $siteContato;
        $this->motivoContato = $motivoContato;
    }
    public function contato()
    {
        $motivo_contato = $this->buscarMotivoContato();
        return view('site.contato', ['titulo' => 'Contato', 'motivo_contato' => $motivo_contato]);
    }

    public function buscarMotivoContato()
    {
        try {
            $motivo_contato = $this->motivoContato->buscarMotivoContato();
            return  $motivo_contato;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function Salvar_contato(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required|min:3|max:40|unique:site_contatos',
                'telefone' => 'required',
                'email' => 'email',
                'motivo_contato_id' => 'required|numeric',
                'mensagem' => 'required|max:300'
            ],
            [
                'required'=>'O campo :attribute é obrigatorio.',
                'unique'=> 'O :attribute informado já está em uso.',
                'min'=>'É necessario no minimo 3 caractéres para o campo :attribute',
                'nome.max'=>'Máximo de 40 caractéres atingidos para o campo :attribute.',
                'mensagem.max'=>'Máximo de 300 caractéres atingidos para o campo :attribute',
                'email'=>'O campo :attribute, não é valido',
                'motivo_contato_id.numeric'=>'Escolha uma das opções, para preencher o campo Motivo Contato'
            ]
        );
        try {
            $dados = $request->all();
            $this->siteContato->Salvar_contato($dados);
            return redirect()->route('site.index');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
