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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('OrderID');
            $table->date('OrderDate');
            $table->double('total');
            $table->enum('StatusBill', ['non_accept', 'accept']);
            $table->enum('StatusDilevery', ['prepare', 'process', 'done']);
            $table->string('UserName');
            $table->string('Email');
            $table->string('phone');
            $table->string('OrderLocation');
            $table->unsignedBigInteger('UserID')->nullable();
            $table->unsignedBigInteger('DeliveryID');
            $table->unsignedBigInteger('PaymentID');
            $table->foreign('UserID')->references('UserID')->on('users');
            $table->foreign('DeliveryID')->references('DeliveryID')->on('deliveries');
            $table->foreign('PaymentID')->references('PaymentID')->on('payments');
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
};