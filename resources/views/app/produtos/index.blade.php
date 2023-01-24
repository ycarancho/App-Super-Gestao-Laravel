@extends('app.layouts.basico')
@section('titulo', 'Produto')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Lista - Produtos</p>
        </div>

        <div class="menu" style="margin-bottom: 20px; border-bottom: 1px solid grey">
            <li><a href="{{route('produto.create')}}">Novo</a></li>
            <li><a href="#">Consulta</a></li>
        </div>

        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto; margin-right:auto">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th>Vizualizar</th>
                            <th>Comprimento</th>
                            <th>Largura</th>
                            <th>Altura</th>
                            <th>Excluir</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto )
                            <tr>
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->descricao}}</td>
                                <td>{{$produto->peso}}</td>
                                <td>{{$produto->unidade_id}}</td>
                                <td><a href="{{route('produto.show', ['produto'=>$produto->id])}}">Vizualizar</a></td>
                                <td>{{$produto->produtoDetalhe->comprimento ?? ''}}</td>
                                <td>{{$produto->produtoDetalhe->largura ?? ''}}</td>
                                <td>{{$produto->produtoDetalhe->altura ?? ''}}</td>
                                <td>
                                    <form id="form_{{$produto->id}}" action="{{route('produto.destroy', ['produto'=>$produto->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{route('produto.edit', ['produto'=>$produto->id])}}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$produtos->appends($request)->links()}}
                <br>
                Exibindo {{$produtos->count()}} por pagina,  de {{$produtos->total()}} total
            </div>
        </div>
    </div>
@endsection
