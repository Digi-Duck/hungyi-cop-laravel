<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_managements', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('target');
            $table->dateTime('approved_date');
            $table->dateTime('start_date');
            $table->dateTime('finished_date');
            $table->string('director');
            $table->string('remark');
            $table->string('creator');
            $table->string('img');
            $table->string('assign_names')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_managements');
    }
}
