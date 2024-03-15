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
        Schema::create('page_tops', function (Blueprint $table) {
            $table->id();
            $table->string('page_name', 70);
            $table->string('logo_img', 250);
            $table->string('top_bg_img', 250);
            $table->string('page_title', 250);
            $table->string('page_subtitle', 250)->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_tops');
    }
};
