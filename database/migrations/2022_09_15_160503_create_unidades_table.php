<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);
            $table->string('descricao', 30);
            $table->timestamps();
        });

        //adiciona relacionamento com a tabela produto
        Schema::table('produto', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');//cria uma nova coluna 'unidade_id' na tabela produto
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        //adiciona relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id'); //cria uma nova coluna 'unidade_id' na tabela produto_detalhes
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

                //remove relacionamento com a tabela produto
                Schema::table('produto', function (Blueprint $table) {
                   $table->dropForeign('produto_unidade_id_foreign'); //[table]_[coluna]_foreign
                   $table->dropColumn('unidade_id');
                });
        
                //remove relacionamento com a tabela produto_detalhes
                Schema::table('produto_detalhes', function (Blueprint $table) {
                    $table->dropForeign('produto_detalhes_unidade_id_foreign'); //[table]_[coluna]_foreign
                    $table->dropColumn('unidade_id');
                });

                
        Schema::dropIfExists('unidades');
    }
}
