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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('short_description');
            $table->text('long_description');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('discount_price');
            $table->unsignedBigInteger('amount');
            $table->unsignedBigInteger('category_id');
            $table->text('additional');
            $table->text('seo_title');
            $table->text('seo_description');
            $table->string('image');
            $table->unsignedBigInteger('status');
            $table->unsignedBigInteger('similar_products');//tags
            $table->unsignedBigInteger('additional_products');//tags
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
