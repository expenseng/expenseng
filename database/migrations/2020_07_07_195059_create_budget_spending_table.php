<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetSpendingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_spending', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('amount_spent');
            $table->string('year');
            $table->string('month');
            $table->string('project');
            $table->foreign('project')
                    ->references('project_name')
                    ->on('budget');
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
        Schema::dropIfExists('budget_spending');
    }
}
