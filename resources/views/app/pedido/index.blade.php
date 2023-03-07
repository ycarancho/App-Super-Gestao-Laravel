@extends('app.layouts.basico')
@section('titulo', 'Pedido')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Lista - Pedidos</p>
        </div>

        <div class="menu" style="margin-bottom: 20px; border-bottom: 1px solid grey">
            <li><a href="{{route('pedido.create')}}">Novo</a></li>
            <li><a href="#">Consulta</a></li>
        </div>

        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto; margin-right:auto">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Pedido ID</th>
                            <th>Cliente ID</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido )
                            <tr>
                                <td>{{$pedido->id}}</td>
                                <td>{{$pedido->cliente_id}}</td>
                                <td><a href="{{route('pedido-produto.create', ['pedido'=> $pedido->id])}}">Adicionar Produto</a></td>
                                <td><a href="{{route('pedido.show', ['pedido'=>$pedido->id])}}">Vizualizar</a></td>
                                <td>
                                    <form id="form_{{$pedido->id}}" action="{{route('pedido.destroy', ['pedido'=>$pedido->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{route('pedido.edit', ['pedido'=>$pedido->id])}}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$pedidos->appends($request)->links()}}
                <br>
                Exibindo {{$pedidos->count()}} por pagina,  de {{$pedidos->total()}} total
            </div>
        </div>
    </div>
@endsection
