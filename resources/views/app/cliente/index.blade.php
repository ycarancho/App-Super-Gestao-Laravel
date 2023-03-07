@extends('app.layouts.basico')
@section('titulo', 'Cliente')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Lista - Cliente</p>
        </div>

        <div class="menu" style="margin-bottom: 20px; border-bottom: 1px solid grey">
            <li><a href="{{route('cliente.create')}}">Novo</a></li>
            <li><a href="#">Consulta</a></li>
        </div>

        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto; margin-right:auto">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente )
                            <tr>
                                <td>{{$cliente->nome}}</td>
                                <td><a href="{{route('cliente.show', ['cliente'=>$cliente->id])}}">Vizualizar</a></td>
                                <td>
                                    <form id="form_{{$cliente->id}}" action="{{route('cliente.destroy', ['cliente'=>$cliente->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{route('cliente.edit', ['cliente'=>$cliente->id])}}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$clientes->appends($request)->links()}}
                <br>
                Exibindo {{$clientes->count()}} por pagina,  de {{$clientes->total()}} total
            </div>
        </div>
    </div>
@endsection
