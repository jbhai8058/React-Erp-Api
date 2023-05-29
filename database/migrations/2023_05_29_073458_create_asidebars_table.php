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
            $table->id('asidebars_id');
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('sub_module_id');
            $table->string('vr_title');
            $table->string('vr_link');
            $table->string('vr_type');
            $table->string('is_visible');
            $table->string('sort_order');
            $table->string('vr_rights');
            $table->string('vr_icon');

            // Add foreign key constraints
            $table->foreign('module_id')->references('module_id')->on('mainnav_modules')->where('vr_title', 'Your Desired Value');;
            $table->foreign('sub_module_id')
                ->references('sub_module_id')
                ->on('submainnav_modules')
                ->where('vr_title', 'Your Desired Value');
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
