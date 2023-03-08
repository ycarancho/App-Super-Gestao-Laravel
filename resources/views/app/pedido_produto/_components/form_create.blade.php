<form action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}" method="POST">
    @csrf
    <select name="produto_id">
        <option>-- Selecione o Produto --</option>
        @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}"
                {{ ($produto->id ?? old('produto_id')) == $produto->id ? 'selected' : '' }}>
                {{ $produto->nome }}</option>
        @endforeach
    </select>
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}
    <input type="number" class="borda-preta" value="{{ old('quantidade') ? old('quantidade') : '' }}" placeholder="Quantidade" name="quantidade">
    {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}
    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
