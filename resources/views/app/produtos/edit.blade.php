@extends('app.layouts.basico')
@section('titulo', 'Produto')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar - Produto</p>
        </div>

        <div class="menu" style="margin-bottom: 20px; border-bottom: 1px solid grey">
            <li><a href="{{route('produto.index')}}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </div>

        <div class="informacao-pagina">
            {{$msg ?? ''}}
            <div style="width:30%; margin-left:auto; margin-right:auto">
                @component('app.produtos._components.form_create_edit', ['produto'=>$produto, 'unidades'=>$unidades, 'fornecedores'=>$fornecedores])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
