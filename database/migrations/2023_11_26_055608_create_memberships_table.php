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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['primary', 'associate', 'overseas'])->nullable();
            $table->string('membership_number', 15)->unique();
            $table->enum('approval_status', ['approved', 'rejected', 'pending'])->default('pending');
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('name')->nullable();
            $table->date('dob')->nullable();
            $table->string('civil_id', 20)->nullable();
            $table->string('qualification', 100)->nullable();
            $table->string('institute', 100)->nullable();
            $table->string('profession', 50)->nullable();
            $table->string('organization', 100)->nullable();
            $table->string('kw_primary_contact_number', 15)->nullable();
            $table->string('kw_secondary_contact_number', 15)->nullable();
            $table->string('email', 75)->unique();
            $table->string('passport_number', 15)->nullable();
            $table->string('specialization')->nullable();
            $table->date('doj')->nullable();
            $table->string('kw_flat_number', 50)->nullable();
            $table->string('kw_building_number', 50)->nullable();
            $table->string('kw_street_number', 50)->nullable();
            $table->string('kw_block_number', 50)->nullable();
            $table->string('kw_area', 100)->nullable();
            $table->string('governorate', 100)->nullable();
            $table->string('in_house_name', 100)->nullable();
            $table->string('in_ward_area', 100)->nullable();
            $table->string('in_taluk', 100)->nullable();
            $table->string('in_post_office', 100)->nullable();
            $table->string('in_district', 50)->nullable();
            $table->string('in_state', 50)->nullable();
            $table->string('in_pincode', 10)->nullable();
            $table->string('in_primary_contact_number', 15)->nullable();
            $table->string('in_secondary_contact_number', 15)->nullable();
            $table->enum('marital_status', ['single', 'married'])->nullable();
            $table->boolean('family_in_kuwait')->comment('1-yes, 0-no')->nullable();
            $table->string('spouse_name', 100)->nullable();
            $table->string('child1_name', 100)->nullable();
            $table->string('child2_name', 100)->nullable();
            $table->string('child3_name', 100)->nullable();
            $table->string('child4_name', 100)->nullable();
            $table->boolean('membership_fee_collected')->comment('1-yes, 0-no')->nullable();
            $table->string('photo')->nullable();
            $table->date('next_renewal_date')->nullable();
            $table->enum('renewal_status', ['pending', 'renewed'])->nullable();
            $table->date('approved_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
