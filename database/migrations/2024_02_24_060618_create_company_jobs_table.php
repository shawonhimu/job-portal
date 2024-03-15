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
        Schema::create('company_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title', 200);
            $table->string('job_description', 1000);
            $table->string('benefits', 300);
            $table->string('required_skills', 500);
            $table->string('application_deadline', 70);
            $table->string('salary', 50);

            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('job_category_id');

            $table->foreign('company_id')->references('id')->on('companies')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign('employee_id')->references('id')->on('company_employees')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign('job_category_id')->references('id')->on('job_categories')
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
        Schema::dropIfExists('company_jobs');
    }
};
