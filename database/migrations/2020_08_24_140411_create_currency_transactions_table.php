<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrencyTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userID');
            $table->dateTime('date');
            $table->boolean('type');
            $table->string('currency');
            $table->float('amount');
            $table->primary('id');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currency_transactions');
    }
}
