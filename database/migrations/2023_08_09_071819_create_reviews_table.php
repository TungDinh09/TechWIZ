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
        Schema::create('reviews', function (Blueprint $table) {
            
            $table->id('ReviewID');
            $table->enum('Rating', ['1', '2', '3', '4', '5']);
            $table->string('Comment', 225);
            $table->unsignedBigInteger('UserID');
            $table->unsignedBigInteger('Product_ID');
            $table->foreign('UserID')->references('UserID')->on('users');
            $table->foreign('Product_ID')->references('Product_ID')->on('products');
            $table->unique(['UserID', 'Product_ID']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};