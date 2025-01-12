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
        Schema::table('orders', function (Blueprint $table) {
            $table->date('travel_date')->nullable()->after('status');
            $table->integer('duration')->nullable()->after('travel_date'); // Add the travel_date column
            $table->boolean('cancellation_status')->default(false)->after('duration'); // Add the cancellation_status column
            $table->timestamp('cancelled_at')->nullable()->after('cancellation_status'); // Add the cancelled_at column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('travel_date');
            $table->dropColumn('duration');
            $table->dropColumn('cancellation_status');
            $table->dropColumn('cancelled_at');
        });
    }
};
