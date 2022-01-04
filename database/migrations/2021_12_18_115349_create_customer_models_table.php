<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->nullable();
            $table->string('name', 40)->nullable();
            $table->string('status', 1)->nullable();
            $table->string('address1', 40)->nullable();
            $table->string('address2', 40)->nullable();
            $table->string('email', 40)->nullable();
            $table->integer('mobile')->nullable();
            $table->string('nic', 15)->nullable();
            $table->string('created_by', 20)->nullable();
            $table->string('updated_by', 20)->nullable();
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
        Schema::dropIfExists('customers');
    }
}
