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
        Schema::create('product_orders', function (Blueprint $table) {
            $table->id('ProductOrderID');
            $table->integer('Quantity');
            $table->float('Price');
            $table->float('total');
            $table->unsignedBigInteger('Product_ID');
            $table->unsignedBigInteger('OrderID');
            $table->foreign('Product_ID')->references('Product_ID')->on('products');
            $table->foreign('OrderID')->references('OrderID')->on('orders');
            $table->unique(['Product_ID', 'OrderID']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_orders');
    }
};