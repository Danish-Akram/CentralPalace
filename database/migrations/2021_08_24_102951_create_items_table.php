<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('titmcod');
            $table->string('titmdsc');
            $table->string('twrndsc');
            $table->string('titmsts');
            $table->string('tctgcod');
            $table->string('tcmpcod');
            $table->string('titmnat');
            $table->string('tappusr');
            $table->string('tedtusr');
            $table->string('ttypcod');
            $table->string('titmuom');
            $table->string('tacccod');
            $table->string('tdelflg');
            $table->string('twebcod');
            $table->string('tcapcod');
            $table->string('tcreated_by');
            $table->string('tupdated_by');
            $table->string('tpurrat');
            $table->float('tsalrat');
            $table->float('tfixrat');
            $table->float('tmanrat');
            $table->float('trtlrat');
            $table->float('titmlev');
            $table->float('tinsprc');
            $table->float('tinsrat');
            $table->float('tlckrat');
            $table->float('tcomamt');
            $table->float('tordqnt');
            $table->float('tovgrat');
            $table->float('thlfrat');
            $table->float('tactrat');
            $table->float('tadvamt');
            $table->float('tmthnum');
            $table->float('twebrat');
            $table->date('tedtdat');
            $table->date('tappdat');
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
        Schema::dropIfExists('items');
    }
}
