<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplications', function (Blueprint $table) {
            
            $table->increments('id');

            $table->string('name');
            $table->string('description');
            $table->string('url');
            $table->string('logo');
            $table->enum('type',['Herramienta_Autor','Repositorio']);
            $table->enum('state',['Activo','Inactivo']);

            $table->timestamps();
           //$table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('aplications');
    }
}
