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
        Schema::table('bookmarks', function (Blueprint $table) {
            $table->decimal('total_price', 8, 2); // Add total_price column
            $table->integer('num_people');        // Add num_people column
        });
    }

    public function down()
    {
        Schema::table('bookmarks', function (Blueprint $table) {
            $table->dropColumn('total_price');
            $table->dropColumn('num_people');
        });
    }

};
