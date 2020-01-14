<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('statement_id');
            $table->foreign('statement_id')
                    ->references('id')->on('statements')
                    ->onDelete('cascade');
            $table->string('name');
            $table->mediumText('description');
            $table->string('quantity');
            $table->string('rate');
            $table->enum('unit', ['kg']);
            $table->string('custom_unit');
            $table->string('amount');
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
        Schema::dropIfExists('line_items');
    }
}
