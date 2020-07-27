<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment_no');
            $table->string('payment_code')->index(); //the first 4 digits here determine the ministry the organization is under
            $table->string('organization');  //an organization is classified under a ministry but may not necessarily be a ministry
            $table->string('beneficiary', 191);
            $table->double('amount');
            $table->date('payment_date')->nullable();
            $table->text('description');
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
        Schema::dropIfExists('payments');
    }
}
