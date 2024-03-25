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
        Schema::create('plant_categories', function (Blueprint $table) {
            $table->id('PlantCategoryID');
            $table->unsignedBigInteger('Product_ID');
            $table->unsignedBigInteger('CategoryID');
            $table->foreign('Product_ID')->references('Product_ID')->on('products');
            $table->foreign('CategoryID')->references('CategoryID')->on('categories');
            $table->unique(['Product_ID', 'CategoryID']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plant_categories');
    }
};