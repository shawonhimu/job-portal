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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();

            $table->string('company_name', 100);
            $table->string('company_type', 70);
            $table->string('company_details', 1000);
            $table->string('establish_date', 70);
            $table->string('company_logo', 70);
            $table->string('company_phone', 15);
            $table->string('company_email', 70)->unique();
            $table->string('company_TIN_no', 70);
            $table->string('company_fax_no', 70);
            $table->string('company_password', 200);
            $table->string('otp', 10);

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
