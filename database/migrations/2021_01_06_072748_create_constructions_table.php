<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constructions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type_id')->nullable();
            $table->longText('imgs')->nullable();
            $table->string('owner')->nullable();
            $table->string('duration')->nullable();
            $table->string('award_date')->nullable();
            $table->string('start_date')->nullable();
            $table->string('price')->nullable();
            $table->string('scheduled_progress')->nullable();
            $table->string('actual_progress')->nullable();
            $table->longText('content')->nullable();
            $table->integer('sort')->default(0)->nullable();
            $table->integer('view_times')->default(0);
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
        Schema::dropIfExists('constructions');
    }
}
