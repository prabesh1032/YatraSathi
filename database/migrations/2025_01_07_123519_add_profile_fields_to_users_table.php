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
            $table->string('role')->default('user'); // Add the 'role' column
            $table->string('phone')->nullable();    // Add the 'phone' column
            $table->text('address')->nullable();
            $table->string('profile_picture')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');    // Remove the 'role' column
            $table->dropColumn('phone');  // Remove the 'phone' column
            $table->dropColumn('address');
            $table->dropColumn('profile_picture');
        });
    }
};
