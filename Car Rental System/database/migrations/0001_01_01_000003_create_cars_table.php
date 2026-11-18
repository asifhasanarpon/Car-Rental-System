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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model_name');
            $table->string('image_url');
            $table->decimal('price_per_day', 8, 2);
            $table->integer('capacity')->default(4);
            $table->string('transmission')->default('Automatic');
            $table->string('mileage')->default('400km');
            $table->string('fuel_type')->default('Petrol');
            $table->integer('reviews_count')->default(450);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
