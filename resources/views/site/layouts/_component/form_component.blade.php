{{ $slot }}
<form action="{{ route('site.contato') }}" method="POST">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe }}">
    {{$errors->has('nome')? $errors->first('nome'): ''}}
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $classe }}">
    {{$errors->has('telefone')? $errors->first('telefone'): ''}}
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe }}">
    {{$errors->has('email')? $errors->first('email'): ''}}
    <br>
    <select class="{{ $classe }}" name="motivo_contato_id">
        <option selected>Qual o motivo do contato?</option>
        @foreach ($motivo_contato as $key => $value)
            <option value="{{ $value->id }}" {{ old('motivo_contato_id') == $value->id ? 'selected' : '' }}>
                {{ $value->motivo_contato }}</option>
        @endforeach
    </select>
    {{ $errors->has('motivo_contato_id') ? $errors->first('motivo_contato_id'): '' }}
    <br>
    <textarea name="mensagem" class="{{ $classe }}">{{ old('mensagem') != '' ? old('mensagem') : 'Preencha aqui a sua mensagem' }}</textarea>
    {{$errors->has('mensagem')? $errors->first('mensagem'): ''}}
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>
{{-- @if ($errors->any())
    <div style="position: absolute; top:0px; left:0px; width:100%; background:red">
        @foreach ($errors->all() as $erro)
            {{$erro}}
            <br>
        @endforeach
    </div>
@endif --}}
