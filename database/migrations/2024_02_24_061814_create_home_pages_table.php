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
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();

            $table->string('site_name', 70);
            $table->string('site_slogan', 100);
            $table->string('banner_title', 200);
            $table->string('banner_subtitle', 200);
            $table->string('banner_bg_img', 200);
            $table->string('banner_top_img', 200);
            $table->string('btn1_title', 160);
            $table->string('btn2_title', 160);

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};
