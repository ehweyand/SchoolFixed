<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Instituicao extends Model
{
    //
    protected $table = 'instituicoes'; 
    protected $fillable = ['descricao', 'cep', 'logradouro', 'complemento', 'bairro', 'uf', 'user_id']; 

    public function usuarios (){
        return $this->hasOne('App\User');
    }
 

}
