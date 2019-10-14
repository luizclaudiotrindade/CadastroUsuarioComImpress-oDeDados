<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cadastro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('usuarios', function (Blueprint $table) {
            Schema::enableForeignKeyConstraints();
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('cpf',11)->unique();
            $table->bigInteger('opcao_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();
            
            $table->foreign('opcao_id')->references('id')->on('opcoes')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
