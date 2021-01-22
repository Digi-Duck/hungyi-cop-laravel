<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeToSecurityPolitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('security_polities', function (Blueprint $table) {
            $table->string('orange_text', 255)->nullable()->change();
            $table->string('blue_text', 255)->nullable()->change();
            $table->integer('sort')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('security_polities', function (Blueprint $table) {
            //
        });
    }
}
