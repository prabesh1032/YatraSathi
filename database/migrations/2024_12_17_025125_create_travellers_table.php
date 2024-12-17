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
    Schema::create('travellers', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email');
        $table->unsignedBigInteger('package_id')->nullable();
        $table->date('travel_date')->nullable();
        $table->text('review')->nullable();
        $table->enum('payment_status', ['paid', 'pending'])->default('pending');
        $table->timestamps();

        // Foreign Key Constraint
        $table->foreign('package_id')->references('id')->on('packages')->onDelete('set null');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travellers');
    }
};
