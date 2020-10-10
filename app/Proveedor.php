<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{

    protected $fillable=['nombre','tipo_documento','numero','telefono','email','direccion'];

    public function users(){
        return $this->belongsToMany('App\User','compras')->withPivot('numcompra','impuesto','total','estado');
    }
    //
    public $timestamps=false;
    protected $table='proveedores';

}
