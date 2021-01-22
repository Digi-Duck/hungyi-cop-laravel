<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVotesToSecurityPolitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('security_polities', function (Blueprint $table) {
            //
            $table->string('deaths')->nullable()->change();
            $table->renameColumn('deaths', 'orange_text');
            $table->string('injury')->nullable()->change();
            $table->renameColumn('injury', 'blue_text');
            $table->dropColumn(['fines_million', 'fines_times', 'accidents_false', 'accidents_times', 'accidents_people', 'hospitalized']);
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
