<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->unsignedBigInteger('setor_id');
            $table->string('cpf', 14);
            $table->string('rg', 10);
            $table->date('data_nascimento');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('setor_id')->references('id')->on('setores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcionarios', function(Blueprint $table){
            $table->dropForeign('funcionarios_setor_id_foreign');
    });
        Schema::dropIfExists('funcionarios');
    }
}
