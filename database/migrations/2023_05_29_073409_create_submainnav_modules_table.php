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
            $table->id();
            $table->unsignedBigInteger('mainnav_module_id');
            $table->string('sub_module_name');
            $table->string('sub_module_icon');
            $table->boolean('is_visible')->default(true);
            $table->integer('sort_order')->nullable();
            $table->timestamps();

            $table->foreign('mainnav_module_id')->references('id')->on('mainnav_modules')->onDelete('cascade');
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
