<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->integer('stock')->default(0);
            
            $table->boolean('estado')->default(true);
            $table->string('imagen');
            $table->timestamps();
        });


      //  DB::table('products')->insert(array('id'=>'1','nombre'=>'lapicero',
        //'categoria_id'=>1,'stock'=>0,'estado'=>true,'imagen'=>'noimagen.png'));
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
