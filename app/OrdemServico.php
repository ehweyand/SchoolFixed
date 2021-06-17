<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{


    protected $table = 'ordem_servicos';
    protected $fillable = ['servico_id','descricao', 'valor', 'instituicao_id'];
}
