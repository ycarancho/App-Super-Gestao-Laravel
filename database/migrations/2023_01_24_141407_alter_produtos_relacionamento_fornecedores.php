<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentoFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produto', function (Blueprint $table) {
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                "nome" => "Fornecedor Padrão SG",
                "site" => "fornecedorpadrão.com.br",
                "uf" => "SP",
                "email" => "contato@fornecedorpadrão.com.br",
            ]);

            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produto', function (Blueprint $table) {
            $table->dropForeign('produto_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
    }
}
