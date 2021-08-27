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
            $table->timestamps();
            $table->string('unidades', 5); // cm, mm, kg
            $table->string('descricao', 30);
        });

        // adicionar o relacionamento com a tabela produtos
        Schema:: table('produtos', function (Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        // adicionar o relacionamento com a tabela produtos_detalhes
        Schema:: table('produto_detalhes', function (Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
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

        // remover o relacionamento com a tabela produtos_detalhes
        Schema:: table('produto_detalhes', function (Blueprint $table){

            // remover a fk
            $table->dropForeign('produto_detalhes_unidade_id_foreign'); // [table]_coluna_foreign
            // remover a coluna unidade_id
            $table->dropColumn('unidade_id');

        });

        // remover o relacionamento com a tabela produtos
        Schema:: table('produtos', function (Blueprint $table){

           // remover a fk
           $table->dropForeign('produtos_unidade_id_foreign'); // [table]_coluna_foreign
           // remover a coluna unidade_id
           $table->dropColumn('unidade_id');

        });

        
        Schema::dropIfExists('unidades');
    }
}
