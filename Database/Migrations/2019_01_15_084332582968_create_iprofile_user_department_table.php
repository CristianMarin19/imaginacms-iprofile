<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('iprofile__user_department', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your fields
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')
              ->references('id')
              ->on('iprofile__departments')
              ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('iprofile__user_department');
    }
};
