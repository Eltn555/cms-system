<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('saleItem_id');
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 10, 2);
            $table->integer('total_amount');
            $table->string('status');
            $table->unsignedBigInteger('payment_id');
            $table->string('payment');
            $table->string('collecting_type');
            $table->string('address_place');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Adjust the 'saleItem_id' reference based on your actual item table name
            $table->foreign('saleItem_id')->references('id')->on('sale_items')->onDelete('cascade');
            // Define foreign key for 'payment_id' if applicable
            // $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
