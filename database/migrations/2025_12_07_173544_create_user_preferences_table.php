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
        Schema::create('user_preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->json('preferred_destinations')->nullable(); // Array of destination IDs/names
            $table->json('travel_style')->nullable(); // ['adventure', 'relaxation', 'cultural', 'family', 'romantic']
            $table->string('budget_range')->nullable(); // 'budget', 'standard', 'luxury'
            $table->json('preferred_duration')->nullable(); // [3, 5, 7, 10, 14] days
            $table->json('activities')->nullable(); // ['hiking', 'sightseeing', 'water-sports', 'photography', etc.]
            $table->string('accommodation_type')->nullable(); // 'hotel', 'resort', 'homestay', 'camping'
            $table->boolean('transportation_preference')->default(false); // true for private, false for group
            $table->integer('group_size_preference')->default(2); // Preferred number of people
            $table->json('avoid_destinations')->nullable(); // Destinations to avoid
            $table->text('special_requirements')->nullable(); // Any special needs or requirements
            $table->boolean('preferences_completed')->default(false); // Track if user completed the form
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_preferences');
    }
};
