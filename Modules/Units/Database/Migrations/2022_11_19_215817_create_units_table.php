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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('desc');
            $table->bigInteger('tech_need');
            $table->bigInteger('research_need1');
            $table->bigInteger('research_need2');
            $table->bigInteger('research_need3');
            $table->bigInteger('research_need4');
            $table->bigInteger('research_need5');
            $table->bigInteger('research_need6');
            $table->bigInteger('tech_level');
            $table->bigInteger('tech_build_time');
            $table->bigInteger('ress1');
            $table->bigInteger('ress2');
            $table->bigInteger('ress3');
            $table->bigInteger('ress4');
            $table->bigInteger('ress5');
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
        Schema::dropIfExists('units');
    }
};
