<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable; // Puxando o contrato

// Puxe o contrato e o implemente no model
class Setor extends Model implements Auditable {

    //Definindo o uso do trait
    use \OwenIt\Auditing\Auditable;

    protected $table = 'setores';
    protected $fillable = ['descricao'];
}
