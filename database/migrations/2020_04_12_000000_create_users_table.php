<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * $table->string('dni',8)->unique();
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('email',30)->unique();
            $table->string('dni',8);
            $table->string('telefono',15)->default('');
            $table->string('imagen',100);
            $table->string('direccion',100)->default('');
            $table->string('usuario',20)->unique();            
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->char('estado',1)->default('1');
            $table->integer('idrol')->unsigned();
            $table->foreign('idrol')->references('id')->on('roles');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')
        ->insert(array('id'=>'1','nombre'=>'Administrador','email'=>'admin@admin.com',
                        'dni'=>'12345678','telefono'=>'987654321','imagen'=>'noimagen.png',
                        'direccion'=>'PERU-LIMA-SJL',
                        'usuario'=>'admin','password'=>Hash::make('administrador'),
                        'idrol'=>1,'estado'=>1));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
    
}
