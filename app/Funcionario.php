<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionarios';
    protected $fillable = ['nome', 'setor_id', 'cpf', 'rg', 'data_nascimento'];
}
