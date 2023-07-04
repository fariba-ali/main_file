<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenderVacationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vender_vacations', function (Blueprint $table) {
            $table->id();
            $table->string('vender_name');
            $table->integer('vender_id');
            $table->integer('fromH');
            $table->integer('untilH');
            $table->integer('firstDay');
            $table->integer('lastDay');
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
        Schema::dropIfExists('vender_vacations');
    }
};
