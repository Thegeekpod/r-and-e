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
        Schema::create('edge_network_submissions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['professional', 'business']);
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('city')->nullable();

            // Accounting Professional specific
            $table->string('qualification')->nullable();
            $table->string('experience_years')->nullable();
            $table->text('skills')->nullable();
            $table->string('availability')->nullable();
            $table->string('expected_fees')->nullable();
            $table->text('bio')->nullable();
            $table->string('resume_path')->nullable();

            // Business Requirement specific
            $table->string('company_name')->nullable();
            $table->string('business_nature')->nullable();
            $table->string('service_needed')->nullable();
            $table->string('engagement_type')->nullable();
            $table->string('expected_budget')->nullable();
            $table->text('requirement_details')->nullable();
            $table->string('attachment_path')->nullable();

            // Status & Admin management
            $table->enum('status', ['pending', 'contacted', 'shortlisted', 'in_progress', 'completed', 'rejected'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edge_network_submissions');
    }
};
