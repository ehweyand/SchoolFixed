<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituicoes', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 200);
            $table->string('cep', 9);
            $table->string('logradouro', 200);
            $table->string('complemento', 50);
            $table->string('bairro', 100);
            $table->string('uf', 2); 
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('usuarios'); 
            $table->timestamps();
            $table->softDeletes();
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void 
     */
    public function down()
    {
        Schema::table('instituicoes', function(Blueprint $table){
            $table->dropForeign('instituicoes_user_id_foreign');
    });
        Schema::dropIfExists('instituicoes');
    }
}
