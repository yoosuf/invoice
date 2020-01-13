<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('account_id');
            $table->foreign('account_id')
                    ->references('id')->on('accounts')
                    ->onDelete('cascade');

            $table->enum('contact_type', ['individual', 'organization']);
            $table->string('company_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('website');
            $table->string('phone');
            $table->string('fax');
            $table->string('tin');
            $table->longText('notes');
            $table->unsignedBigInteger('currency_id');
            $table->foreign('currency_id')
                    ->references('id')->on('currencies')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('language_id');

            $table->foreign('language_id')
                    ->references('id')->on('languages')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('contacts');
    }
}
