<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preformances', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('preformances_date');
            $table->string('type_id');
            $table->string('location');
            $table->string('funds');
            $table->longText('imgs');
            $table->longText('content')->nullable();
            $table->integer('sort')->default(0)->nullable();
            $table->integer('view_times');
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
        Schema::dropIfExists('preformances');
    }
}
