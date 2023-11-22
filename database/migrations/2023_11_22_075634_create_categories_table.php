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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_type');
            $table->string('name')->nullable();
            $table->string('image')->comment('Maximum Allowed Size is 1000 x 600, filesize 150Kb')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreign('category_type')->references('id')->on('category_types');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
