<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    protected $fillable=['rol','descripcion'];

    public function users(){
        return $this->hasMany('App\User');
    }

    public $timestamps=false;
    protected $table='roles';
}
