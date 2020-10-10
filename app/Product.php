<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['nombre','categoria_id','stock','estado'];
    

    public function categotias(){
        return $this->belongsTo('App\Categoria');
    }
    public function detalle_compras(){
        return $this->hasMany('App\DetalleCompra','detalle_compras')->withPivot('subtotal');
    }
}
