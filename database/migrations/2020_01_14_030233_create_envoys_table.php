<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvoysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envoys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('envoyable');	
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone_ext');
            $table->string('phone');
            $table->string('mobile');
            $table->string('designation');
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
        Schema::dropIfExists('envoys');
    }
}
