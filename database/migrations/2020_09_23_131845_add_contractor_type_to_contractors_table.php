<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContractorTypeToContractorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contractors', function (Blueprint $table) {
            $table->unsignedBigInteger('type')->default(0);
            //setting to allow admin restrict voting on the contractor
            $table->integer('restrict_vote')->default(0);
            $table->foreign('type')->references('id')->on('contractor_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contractors', function (Blueprint $table) {
            $table->removeColumn('type');
        });
    }
}
