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
                <form action="{{route('produto.store')}}" method="POST">
                    @csrf
                    <input type="text" name="nome" value="{{old('nome')}}" placeholder="Nome" class="borda-preta">
                    <input type="text" name="descricao" value="{{old('descricao')}}" placeholder="Descrição"class="borda-preta">
                    <input type="text" name="peso" value="{{old('peso')}}" placeholder="Peso"class="borda-preta">
                    <select name="unidade_id">
                        <option>-- Selecione a Unidade --</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{$unidade->id}}">{{$unidade->descricao}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
