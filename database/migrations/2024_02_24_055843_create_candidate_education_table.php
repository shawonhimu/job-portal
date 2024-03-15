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
        Schema::create('candidate_education', function (Blueprint $table) {
            $table->id();
            $table->string('degree_name', 70);
            $table->string('institute_name', 70);
            $table->string('subject_group', 70);
            $table->string('board', 70);
            $table->string('passing_year', 70);
            $table->string('result', 70);

            $table->unsignedBigInteger('candidate_id');

            $table->foreign('candidate_id')->references('id')->on('candidates')
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
        Schema::dropIfExists('candidate_education');
    }
};
