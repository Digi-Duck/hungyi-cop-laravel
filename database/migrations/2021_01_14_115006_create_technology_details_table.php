<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnologyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technology_details', function (Blueprint $table) {
            $table->id();
            $table->integer('sort')->default(0);
            $table->integer('zones_id');
            $table->integer('blocks_id');
            $table->string('title');
            $table->string('content');
            $table->longText('imgs');
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
        Schema::dropIfExists('technology_details');
    }
}
