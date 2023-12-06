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
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_category_id')->nullable();
            $table->unsignedInteger('order_id')->default(0);
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();

            // Foreign key constraint for parent_category_id referencing category table
            $table->foreign('parent_category_id')->references('id')->on('category')->onDelete('set null');

            // Indexes
            $table->index('order_id');
            // Add other indexes if needed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
};
