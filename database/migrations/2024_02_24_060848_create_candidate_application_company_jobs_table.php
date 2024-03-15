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
        Schema::create('candidate_application_company_jobs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('company_job_id');

            $table->string('current_salary', 20);
            $table->string('expected_salary', 20);

            $table->foreign('candidate_id')->references('id')->on('candidates')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign('company_job_id')->references('id')->on('company_jobs')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_application_company_jobs');
    }
};
