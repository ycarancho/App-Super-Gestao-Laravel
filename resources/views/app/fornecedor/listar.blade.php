@extends('app.layouts.basico')
@section('titulo', 'Fornecedor')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Lista - Fornecedores</p>
        </div>

        <div class="menu" style="margin-bottom: 20px; border-bottom: 1px solid grey">
            <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
            <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
        </div>

        <div class="informacao-pagina">
            <div style="width:90%; margin-left:auto; margin-right:auto">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>Email</th>
                            <th>Ação</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor )
                            <tr>
                                <td>{{$fornecedor->nome}}</td>
                                <td>{{$fornecedor->site}}</td>
                                <td>{{$fornecedor->uf}}</td>
                                <td>{{$fornecedor->email}}</td>
                                <td><a href="{{route('app.fornecedor.excluir',$fornecedor->id )}}">Excluir</a></td>
                                <td><a href="{{route('app.fornecedor.editar',$fornecedor->id )}}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$fornecedores->appends($request)->links()}}
                <br>
                Exibindo {{$fornecedores->count()}} por pagina,  de {{$fornecedores->total()}} total
            </div>
        </div>
    </div>
@endsection
