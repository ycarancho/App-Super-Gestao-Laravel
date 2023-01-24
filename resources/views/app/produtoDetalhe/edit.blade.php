@extends('app.layouts.basico')
@section('titulo', 'Produto')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editar - Detalhes do Produto</p>
        </div>

        <div class="menu" style="margin-bottom: 20px; border-bottom: 1px solid grey">
            <li><a href="#">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </div>

        <div class="informacao-pagina">
            <br>
            <div><h4>Produto</h4></div>
            <div>Nome : {{$produto_detalhe->produto->nome}}</div>
            <br>
            <div>Detalhe : {{$produto_detalhe->produto->descricao}}</div>
            <br>
            <div style="width:30%; margin-left:auto; margin-right:auto">
                @component('app.produtoDetalhe._components.form_create_edit', ['produto_detalhe'=>$produto_detalhe, 'unidades'=>$unidades])
                @endcomponent
            </div>
        </div>
    </div>
@endsection