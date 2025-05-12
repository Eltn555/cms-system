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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('media')->nullable(); // Assuming this is a path to a media file
            $table->json('options')->nullable(); // For storing structured data
            $table->string('setting_group')->nullable(); // Group/category for the setting
            $table->string('setting_key')->nullable(); 
            $table->text('setting_value')->nullable(); // The actual setting value
            
            // Timestamps
            $table->timestamps();
            
            // Indexes
            $table->index('setting_key');
            $table->index('setting_group');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
