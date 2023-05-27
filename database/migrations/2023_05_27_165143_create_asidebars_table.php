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
            $table->integer('module_id'); 
            $table->integer('sub_module_id');   
            $table->string('vr_title');   
            $table->string('vr_link'); 
            $table->string('vr_type'); 
            $table->string('vr_icon'); 
            $table->integer('sort_order'); 
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
