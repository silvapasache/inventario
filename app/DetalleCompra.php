<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    //
    public function compras(){
        return $this->belongsTo('App\Compra');
    }   
    public function products(){
        return $this->belongsTo('App\Product');
    }   
    public $timestamps=false;

    protected $table='detalle_compras';
}
