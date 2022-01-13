<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColmnsToBookItmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_itms', function (Blueprint $table) {
            $table->string('titmdsc',20)->after('tsernum')->nullable();
            $table->string('titmctg',20)->after('titmdsc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_itms', function (Blueprint $table) {
            $table->dropColumn('columns');
        });
    }
}
