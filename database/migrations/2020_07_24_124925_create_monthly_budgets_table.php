<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_budgets', function (Blueprint $table) {
            $table->id();
            //an organization is classified under a ministry but may not necessarily be a ministry
            $table->string('Name');
            $table->string('code')->index(); //the code here determine the ministry the organization is under
            $table->bigInteger('year_payments_till_date');
            $table->string('month', 191);
            $table->bigInteger('month_budget');
            $table->bigInteger('budget_amount');
            $table->bigInteger('budget_balance');
            $table->double('percentage');
            $table->string('categories');
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
        Schema::dropIfExists('monthly_budgets');
    }
}
