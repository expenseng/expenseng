<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('ministry_id')->references('id')->on('ministries_profile')
            //->onDelete('cascade')->constrained();
            //$table->foreignId('company_id')->references('id')->on('companies_profile')
            //->onDelete('cascade')->constrained();
            $table->string('ministry');
            $table->string('company');
            $table->string('description');
            $table->integer('amount');
            $table->date('payment_date');
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
        Schema::dropIfExists('expenses');
    }
}
