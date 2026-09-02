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
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->default('General');
            $table->string('type')->default('Full-time'); // Full-time, Part-time, Contract, Freelance
            $table->string('company_name')->default('Edge Hire Partner');
            $table->string('location')->default('India');
            $table->string('salary_range')->nullable();
            $table->string('experience_required')->nullable();
            $table->text('description');
            $table->text('requirements')->nullable();
            $table->text('benefits')->nullable();
            $table->date('deadline')->nullable();
            $table->enum('status', ['published', 'draft', 'closed'])->default('published');
            $table->boolean('is_featured')->default(false);
            $table->unsignedInteger('views_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_postings');
    }
};
