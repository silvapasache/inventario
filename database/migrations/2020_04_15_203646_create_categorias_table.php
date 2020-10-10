<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->string('descripcion',150);
            //$table->timestamps();
        });
        DB::table('categorias')->insert(array('id'=>'1',
                  'nombre'=>'oficina','descripcion'=>'utiles de oficina'));

        DB::table('categorias')->insert(array('id'=>'2',
                  'nombre'=>'insumos','descripcion'=>'insumos para fabricacion'));

        DB::table('categorias')->insert(array('id'=>'3',
                  'nombre'=>'productos','descripcion'=>'productos terminados-finales/venta'));

        DB::table('categorias')->insert(array('id'=>'4',
                  'nombre'=>'limpieza','descripcion'=>'articulos de limpieza'));
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
