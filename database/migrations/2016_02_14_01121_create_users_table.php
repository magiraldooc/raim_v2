<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('id_rol');

            $table->string('user_name')->unique();
            $table->string('name');
            $table->string('last_name');
            $table->string('institution');
            $table->date('birth_date');
            $table->string('language');
            $table->string('email')->unique();
            $table->string('password', 60);


            $table->foreign('id_rol')->references('id')->on('rol')->onDelete('cascade');

            $table->rememberToken();
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
        Schema::drop('users');
    }
}
