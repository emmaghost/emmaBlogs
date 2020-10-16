<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('id_propietario');
            $table->string('titulo',100);
            $table->text('articulo')->comments('Cual es el articulo que se escribira');
            $table->string('foto')->comments('Foto o referencia del articulo');
            $table->boolean('estatus')->default(0); 
            $table->integer('likes');
            $table->timestamps();          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulo');
    }
}
