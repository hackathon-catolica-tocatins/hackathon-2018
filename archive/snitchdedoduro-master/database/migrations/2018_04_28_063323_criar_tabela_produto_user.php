<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaProdutoUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_user', function (Blueprint $table) {
            //Foreign keys
            $table->integer('id_produto')->nullable()->unsigned();
            $table->integer('id_user')->nullable()->unsigned();

            //Contraints Foreign keys
            $table->foreign('id_produto')->references('id')->on('produtos');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produto_user', function (Blueprint $table) {
            //
        });
    }
}
