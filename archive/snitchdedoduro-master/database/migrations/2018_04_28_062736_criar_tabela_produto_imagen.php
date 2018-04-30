<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaProdutoImagen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_imagem/', function (Blueprint $table) {
            //Foreign keys
            $table->integer('id_produto')->nullable()->unsigned();
            $table->integer('id_imagem')->nullable()->unsigned();

            //Contraints Foreign keys
            $table->foreign('id_produto')->references('id')->on('produtos');
            $table->foreign('id_imagem')->references('id')->on('imagem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produto_imagem/', function (Blueprint $table) {
            //
        });
    }
}
