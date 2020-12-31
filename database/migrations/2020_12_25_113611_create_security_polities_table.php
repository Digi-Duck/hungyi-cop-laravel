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
            $table->integer('deaths')->default(0);
            $table->integer('injury')->default(0);
            $table->integer('hospitalized')->default(0);
            $table->integer('accidents_people')->default(0);
            $table->integer('accidents_times')->default(0);
            $table->integer('accidents_false')->default(0);
            $table->integer('fines_times')->default(0);
            $table->integer('fines_million')->default(0);
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
