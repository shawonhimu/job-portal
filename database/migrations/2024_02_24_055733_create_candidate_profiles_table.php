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
        Schema::create('candidate_profiles', function (Blueprint $table) {
            $table->id();

            $table->string('fullname', 70);
            $table->string('father_name', 70);
            $table->string('mother_name', 70);
            $table->string('date_of_birth', 70);
            $table->string('NID', 70);
            $table->string('birth_registration_id', 70)->nullable();
            $table->string('passport_no', 70)->nullable();
            $table->string('phone', 70);
            $table->string('email', 70);
            $table->string('linked_in', 150)->nullable();
            $table->string('github', 150)->nullable();
            $table->string('social_media1', 150)->nullable();
            $table->string('website', 150)->nullable();
            $table->string('present_address');
            $table->string('permanent_address');

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
        Schema::dropIfExists('candidate_profiles');
    }
};
