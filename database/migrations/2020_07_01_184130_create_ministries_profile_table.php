<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinistriesProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ministries_profile', function (Blueprint $table) {
            $table->id();
            $table->string('ministry_name');
            $table->string('ministry_shortname');
            $table->string('ministry_twitter_handle');
            $table->string('ministry_head');
            $table->string('ministry_head_handle');
            $table->string('ministry_website');
            $table->integer('sector_id');
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
        Schema::dropIfExists('ministries_profile');
    }
}
