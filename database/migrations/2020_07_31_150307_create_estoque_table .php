<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstoqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estoque', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_produto')->unsigned();
            $table->integer('quantidade');
            $table->decimal('valor_un', 24,2)->default(0);
            $table->decimal('valor_total', 24,2)->default(0);
            $table->timestamps();
        });
        Schema::table('estoque', function($table) {
           $table->foreign('id_produto')->references('id')->on('produtos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estoque');
    }


}
