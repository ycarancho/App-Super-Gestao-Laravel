<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjustesProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filiais', function(Blueprint $table){
            $table->id();
            $table->string('filiais', 30);
            $table->timestamps();
        });

        //Criando produtos_filiais

        Schema::create('produtos_filiais', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('filiais_id');
            $table->float('preco_venda', 8, 2);
            $table->integer('estoque_maximo');
            $table->integer('estoque_minimo');

            //Criando constraints
            $table->foreign('produto_id')->references('id')->on('produto');
            $table->foreign('filiais_id')->references('id')->on('filiais');
        });

        Schema::table('produto', function(Blueprint $table){
            $table->dropColumn(['preco_venda', 'estoque_maximo', 'estoque_minimo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produto', function(Blueprint $table){
            $table->float('preco_venda', 8, 2);
            $table->integer('estoque_maximo');
            $table->integer('estoque_minimo');
        });  
        
        Schema::dropIfExists('produtos_filiais');
        Schema::dropIfExists('filiais');
    }
}
