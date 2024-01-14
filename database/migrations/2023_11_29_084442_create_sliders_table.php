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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('top_label', 25)->nullable();
            $table->string('heading', 100)->nullable();
            $table->string('description', 150)->nullable();
            $table->string('button_label', 25)->nullable();
            $table->string('button_url', 100)->nullable();
            $table->string('target', 15)->nullable();
            $table->integer('display_order')->default(1);
            $table->enum('status', ['published', 'draft']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
