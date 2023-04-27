<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('species')->nullable();
            $table->timestamps();
        });

        Schema::create('planet_resident', function (Blueprint $table) {
            $table->foreignId('planet_id');
            $table->foreignId('resident_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('residents');
        Schema::dropIfExists('planet_resident');
    }
}
