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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_posting_id')->nullable()->constrained('job_postings')->nullOnDelete();
            $table->string('applicant_name');
            $table->string('applicant_email');
            $table->string('applicant_phone');
            $table->string('experience_years')->nullable();
            $table->string('current_company')->nullable();
            $table->string('expected_salary')->nullable();
            $table->text('cover_note')->nullable();
            $table->string('resume_path');
            $table->enum('status', ['pending', 'reviewed', 'shortlisted', 'rejected', 'hired'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
