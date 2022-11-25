<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technologies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('desc');
            $table->bigInteger('research_need');
            $table->bigInteger('tech_level');
            $table->bigInteger('tech_build_time');
            $table->bigInteger('ress1');
            $table->bigInteger('ress2');
            $table->bigInteger('ress3');
            $table->bigInteger('ress4');
            $table->bigInteger('ress5');
            $table->bigInteger('is_upgrade');
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('technologies');
    }
};
