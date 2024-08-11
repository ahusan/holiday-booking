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
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('destination');
            $table->decimal('price', 8, 2);
            $table->integer('duration')->comment('Duration in days');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->json('inclusions')->nullable()->comment('List of things included in the package');
            $table->json('exclusions')->nullable()->comment('List of things not included in the package');
            $table->json('itinerary')->nullable()->comment('Detailed day-wise itinerary');
            $table->integer('max_participants')->nullable()->comment('Maximum number of participants');
            $table->string('image_url')->nullable()->comment('URL to a representative image of the package');
            $table->boolean('is_featured')->default(false);
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
