<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_service', function (Blueprint $table) {
            $table->id();
            $table->string("organizationName", 191)->unique();
            $table->string("organizationEmail", 191)->unique();
            $table->string("secret");
            $table->string("adminName");
            $table->string("adminEmail");
            $table->string("adminPassword");
            $table->string("token");
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
        Schema::dropIfExists('comments_service');
    }
}
