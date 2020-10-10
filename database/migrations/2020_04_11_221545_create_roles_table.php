<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rol');
            $table->string('descripcion');
            //$table->timestamps();
        });
        DB::table('roles')->insert(array('id'=>'1','rol'=>'Administrador','descripcion'=>'Administrador'));
        DB::table('roles')->insert(array('id'=>'2','rol'=>'Comprador','descripcion'=>'Vendedor'));
        DB::table('roles')->insert(array('id'=>'3','rol'=>'Vendedor','descripcion'=>'Comprador'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
