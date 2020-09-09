<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractorTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractor_type', function (Blueprint $table) {
            $table->id();
            $table->integer('contractor_id');
            $table->integer('company')->default(0);
            $table->integer('govt_official')->default(0);
            $table->integer('individual')->default(0);
            $table->integer('govt_organization')->default(0);
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
        Schema::dropIfExists('contractor_type');
    }
}
