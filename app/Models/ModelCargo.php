<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelCargo extends Model
{
    protected $table='cargo';
    protected $fillable=['title', 'id_user', 'servico', 'salario'];

    public function relUsers(){

        return $this->hasOne('App\User','id', 'id_user');
    }
}
