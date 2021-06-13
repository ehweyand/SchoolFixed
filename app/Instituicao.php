<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Instituicao extends Model
{
    //
    use \OwenIt\Auditing\Auditable;

    protected $table = 'instituicoes';
    protected $fillable = ['descricao', 'endereco_id', 'usuario_id'];

}
