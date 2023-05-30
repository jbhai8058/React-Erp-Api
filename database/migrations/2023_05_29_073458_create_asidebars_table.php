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
            $table->unsignedBigInteger('mainnav_module_id');
            $table->unsignedBigInteger('sub_module_id');
            $table->string('vr_title');
            $table->string('vr_link');
            $table->string('vr_type');
            $table->string('is_visible');
            $table->string('sort_order');
            $table->string('vr_rights');
            $table->string('vr_icon');
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('mainnav_module_id')->references('id')->on('mainnav_modules')->onDelete('cascade');
            $table->foreign('sub_module_id')->references('id')->on('submainnav_modules')->onDelete('cascade');

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
