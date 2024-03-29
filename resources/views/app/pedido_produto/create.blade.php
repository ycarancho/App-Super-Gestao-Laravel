@extends('app.layouts.basico')
@section('titulo', 'Pedido Produto')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar - Produtos ao Pedido</p>
        </div>

        <div class="menu" style="margin-bottom: 20px; border-bottom: 1px solid grey">
            <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left:auto; margin-right:auto">
                <h4>Detalhes do Pedido</h4>
                <table border="1" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Produto</th>
                            <th>Data de Inserção</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $itens)
                           <tr>
                                <th>{{$itens->id}}</th>
                                <th>{{$itens->nome}}</th>
                                <th>{{$itens->pivot->created_at->format('d/m/Y')}}</th>
                                <th>
                                    <form id="form_{{$itens->pivot->id}}" method="post" action="{{route('pedido-produto.destroy', ['pedidoProduto'=>$itens->pivot->id,'pedido'=>$pedido->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$itens->pivot->id}}').submit()">Excluir</a>
                                    </form>
                                </th>
                           </tr>
                        @endforeach
                    </tbody>
                </table>
                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
