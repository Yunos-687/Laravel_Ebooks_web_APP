<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Add new columns
            $table->string('firstname', 50)->after('email');
            $table->string('lastname', 50)->after('firstname');
            $table->integer('age')->nullable()->after('lastname');
            $table->string('address', 255)->nullable()->after('age');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Remove columns
            $table->dropColumn(['firstname', 'lastname', 'age', 'address']);
        });
    }
};
