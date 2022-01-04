<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToGlkeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('glkeys', function (Blueprint $table) {
            $table->string('tcstadd1',40)->nullable();
            $table->string('tcstadd2',40)->nullable();
            $table->string('tcstema',40)->nullable();
            $table->string('tphnnum',40)->nullable();
            $table->string('tcstnic',40)->nullable();
            $table->string('tbalamt',40)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('glkeys', function (Blueprint $table) {
            $table->dropColumn('columns');
        });
    }
}
