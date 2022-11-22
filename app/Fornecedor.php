<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Fornecedor extends Model
{
    use SoftDeletes;
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];

    public function adcionar($dados)
    {
        Fornecedor::fill($dados)->save();
    }

    public function consultaViaId($id)
    {
        return Fornecedor::find($id);
    }

    public function atualizarUsuario(Request $dados)
    {

        $fornecedor = $this->consultaViaId($dados->get('id'));
        $retorno = $fornecedor->update($dados->all());
        return $retorno;
    }

    public function listarFornecedores(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome') . '%')
             ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->paginate(5);

        return $fornecedores;
    }

    public function excluir ($id){
       return Fornecedor::find($id)->delete();
    }
}
