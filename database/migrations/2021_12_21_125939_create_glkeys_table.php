<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlkeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glkeys', function (Blueprint $table) {
            $table->id();
            $table->string('ttrnnum',6)->nullable();
            $table->date('ttrndat')->nullable();
            $table->time('ttrntim')->nullable();
            $table->string('ttrntyp',6)->nullable();
            $table->string('trefcod',10)->nullable();
            $table->string('tcstnam',40)->nullable();
            $table->string('thalcod',3)->nullable();
            $table->string('tfuncod',3)->nullable();
            $table->string('tempcod',6)->nullable();
            $table->date('tevtdat')->nullable();
            $table->string('tgstnum',10)->nullable();
            $table->string('tperhed',10)->nullable();
            $table->string('ttimfrm',10)->nullable();
            $table->string('ttimtoo',10)->nullable();
            $table->string('thalchg',10)->nullable();
            $table->string('tacchg',10)->nullable();
            $table->string('tdecchg',10)->nullable();
            $table->string('tdjchg',10)->nullable();
            $table->string('thetchg',10)->nullable();
            $table->string('ttrntot',10)->nullable();
            $table->string('tadvamt',10)->nullable();
            $table->string('ttrnrem',10)->nullable();


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
        Schema::dropIfExists('glkeys');
    }
}
