<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    
    protected $fillable = [
        'numcompra', 'user_id', 'proveedor_id','impuesto','total','estado', 
        'created_at','updated_at'
    ];

    public function users(){
        return $this->belongsTo('App\User','users');
    }    
    public function proveedores(){
        return $this->belongsTo('App\Proveedor','proveedores');
    }   
    public function detalle_compras(){
        return $this->hasMany('App\DetalleCompra');
    }
    protected $table='compras';
}
