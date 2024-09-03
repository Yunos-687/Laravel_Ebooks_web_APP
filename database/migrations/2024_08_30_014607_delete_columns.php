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
            // Drop newly added columns
            $table->dropColumn(['firstname', 'lastname', 'age', 'address']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Re-add columns if reverting migration
            $table->string('firstname', 50)->default('')->after('email');
            $table->string('lastname', 50)->default('')->after('firstname');
            $table->integer('age')->default(0)->after('lastname');
            $table->string('address', 255)->default('')->after('age');
        });
    }
};
