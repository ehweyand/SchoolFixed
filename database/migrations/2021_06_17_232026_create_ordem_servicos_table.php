<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdemServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordem_servicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('servico_id'); 
            $table->string('descricao', 200);
            $table->double('valor', 8, 2);
            $table->unsignedBigInteger('instituicao_id'); 
            $table->foreign('servico_id')->references('id')->on('servicos'); 
            $table->foreign('instituicao_id')->references('id')->on('instituicoes'); 
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
        Schema::table('ordem_servicos', function(Blueprint $table){
            $table->dropForeign('ordem_servicos_servico_id_foreign');
            $table->dropForeign('ordem_servicos_instituicao_id_foreign');
    });
        Schema::dropIfExists('ordem_servicos');
    }
}
