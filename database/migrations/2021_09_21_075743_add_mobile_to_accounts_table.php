<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMobileToAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->string('mobile')->unique()->after('status');
            $table->string('email')->unique()->after('mobile');
            $table->string('created_by');
            $table->string('updated_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropColumn('mobile');
                });
    }
}
