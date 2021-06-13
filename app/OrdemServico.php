<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'ordem_servicos';
    protected $fillable = ['descricao', 'valor', 'instituicao_id'];
}
