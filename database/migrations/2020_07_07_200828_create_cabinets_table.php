<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabinetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabinets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('twitter_handle')->nullable();
            $table->string('facebook_handle')->nullable();
            $table->string('instagram_handle')->nullable();
            $table->string('linkedIn_handle')->nullable();
            $table->string('role'); //Minister of State, Minister, Secretary, Permanent Secretary
            $table->string('avatar')->nullable();
            $table->string('ministry_code')->index();
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
        Schema::dropIfExists('cabinets');
    }
}
