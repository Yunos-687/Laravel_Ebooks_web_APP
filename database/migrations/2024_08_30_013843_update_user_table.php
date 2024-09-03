<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Update default values for existing columns
            $table->string('firstname')->default('')->change();
            $table->string('lastname')->default('')->change();
         });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Revert default values to null or previous state if needed
            $table->string('firstname')->default(null)->change();
            $table->string('lastname')->default(null)->change();
         });
    }
};
