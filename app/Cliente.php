<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable=['nombre','tipo_documento','numero','telefono','email','direccion'];
    public function users(){
        return $this->belongsToMany('App\User','ventas');
    }
    public $timestamps=false;
    protected $table='clientes';
}
