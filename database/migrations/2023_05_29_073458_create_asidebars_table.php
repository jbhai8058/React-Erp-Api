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
        Schema::create('asidebars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mainnav_module_id')->constrained('mainnav_modules');
            $table->foreignId('sub_module_id')->constrained('submainnav_modules');
            $table->string('vr_title');
            $table->string('vr_link');
            $table->string('vr_type');
            $table->string('is_visible');
            $table->string('sort_order');
            $table->string('vr_rights');
            $table->string('vr_icon');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asidebars');
    }
};
