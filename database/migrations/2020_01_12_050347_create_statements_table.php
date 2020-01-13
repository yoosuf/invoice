<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('account_id');
            $table->foreign('account_id')
                    ->references('id')->on('accounts')
                    ->onDelete('cascade');

            $table->enum('category', ['invoice', 'estimate', 'bill', 'recurring']);
            $table->string('number');

            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')
                    ->references('id')->on('languages')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('currency_id');
            $table->foreign('currency_id')
                    ->references('id')->on('currencies')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('recipient_id');
            $table->foreign('recipient_id')
                    ->references('id')->on('contacts')
                    ->onDelete('cascade');

            $table->date('date');
            $table->string('due');
            $table->date('due_date');

            $table->enum('schedule', ['yearly', 'quarterly', 'monthly', 'weekly', 'daily', 'other']);
            $table->string('schedule_other');
            $table->boolean('send')->default(false);
            $table->string('po_number');
            $table->string('sub_total');
            $table->string('total');
            $table->mediumText('notes');
            $table->dateTime('sent_at');
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
        Schema::dropIfExists('statements');
    }
}
