<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quality_recognition_submissions', function (Blueprint $table) {
            $table->id();
            $table->uuid('public_id')->unique();
            $table->string('reference', 30)->unique();
            $table->unsignedSmallInteger('award_year');
            $table->string('organization_key', 64)->unique();
            $table->string('company_name');
            $table->string('country', 100);
            $table->string('region', 150);
            $table->string('industry', 150);
            $table->string('company_size', 100)->nullable();
            $table->string('years_in_operation', 50)->nullable();
            $table->string('certifications')->nullable();
            $table->string('contact_name', 150);
            $table->string('designation', 150);
            $table->string('email');
            $table->string('phone', 50)->nullable();
            $table->text('quality_meaning');
            $table->text('mission_vision');
            $table->text('quality_policy');
            $table->text('team_engagement');
            $table->text('improvement');
            $table->text('improvement_impact');
            $table->text('future_goal');
            $table->json('evidence_types')->nullable();
            $table->string('impact_metric')->nullable();
            $table->text('showcase')->nullable();
            $table->boolean('follow_up_consent')->default(false);
            $table->boolean('sharing_consent')->default(false);
            $table->string('status', 20)->default('pending')->index();
            $table->text('review_notes')->nullable();
            $table->unsignedBigInteger('reviewed_by')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamp('acknowledgement_sent_at')->nullable();
            $table->timestamp('notification_sent_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quality_recognition_submissions');
    }
};
