<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('name')->nullable();
            $table->string('role')->nullable();

            $table->string('status')->nullable();
            $table->string('code')->nullable();
            $table->string('expiry_pass')->nullable();
            $table->string('time_from')->nullable();
            $table->string('time_to')->nullable();
            $table->string('cash_code')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->Integer('check_field')->nullable()->default('1');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
