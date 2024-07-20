<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhotopathToDestinationsTable extends Migration
{
    public function up()
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->string('photopath')->nullable(); // Add the photopath column
        });
    }

    public function down()
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->dropColumn('photopath'); // Rollback the change if needed
        });
    }
}
 