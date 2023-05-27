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
        Schema::create('submainnav_modules', function (Blueprint $table) {
            $table->id('sub_module_id');
            $table->string('sub_module_name');
            $table->string('sub_module_icon');
            $table->integer('is_visible');
            $table->integer('sort_order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submainnav_modules');
    }
};
