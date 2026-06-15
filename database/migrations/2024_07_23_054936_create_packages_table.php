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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->string('package_location');
            $table->string('starting_location');
            $table->integer('duration');
            $table->decimal('package_price', 10, 2);
            $table->string('photopath')->nullable();
            $table->text('package_description')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('transportation')->nullable();
            $table->string('accommodation')->nullable();
            $table->string('meals')->nullable();
            $table->foreignId('destination_id')->nullable()->constrained('destinations')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
