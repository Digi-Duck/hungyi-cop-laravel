<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecurityPolitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('security_polities', function (Blueprint $table) {
            $table->id();
            $table->integer('deaths');
            $table->integer('injury');
            $table->integer('hospitalized');
            $table->integer('accidents_people');
            $table->integer('accidents_times');
            $table->integer('accidents_false');
            $table->integer('fines_times');
            $table->integer('fines_million');
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
        Schema::dropIfExists('security_polities');
    }
}
