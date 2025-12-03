<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('package_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('address');
            $table->string('phone');
            $table->string('payment_method'); // Example: 'COD', 'eSewa', etc.
            $table->decimal('total_price', 10, 2);
            $table->integer('num_people')->default(1);
            $table->string('status')->default('pending');
            $table->date('travel_date')->nullable()->after('status');
            $table->integer('duration')->nullable()->after('travel_date'); // Add the travel_date column
            $table->boolean('cancellation_status')->default(false)->after('duration'); // Add the cancellation_status column
            $table->timestamp('cancelled_at')->nullable()->after('cancellation_status'); // Add the cancelled_at column
            $table->foreignId('guide_id')->nullable()->constrained('guides')->onDelete('set null')->after('cancelled_at'); // Add guide_id as a foreign key // Example: 'pending', 'completed'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}
