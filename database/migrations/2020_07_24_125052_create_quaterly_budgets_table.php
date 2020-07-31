<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuaterlyBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quaterly_budgets', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('code')->index(); //the code here determine the ministry the organization is under
            $table->bigInteger('year_payments_till_date');
            $table->string('quarter', 191);
            $table->bigInteger('quarter_budget');
            $table->bigInteger('budget_amount');
            $table->bigInteger('budget_balance');
            $table->double('percentage');
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
        Schema::dropIfExists('quaterly_budgets');
    }
}
