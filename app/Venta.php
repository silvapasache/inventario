<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [
        'tipodocumento','numdocumento', 'user_id', 'cliente_id','impuesto','total','estado', 
        'fechaventa'
    ];
    public function users(){
        return $this->belongsTo('App\User','users');
    }    
    public function clientes(){
        return $this->belongsTo('App\Cliente','clientes');
    }

    public $timestamps=false;
    protected $table='ventas';  
}
