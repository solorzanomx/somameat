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
        Schema::create('channels', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('slug');
            $table->json('tagline')->nullable();
            $table->json('description')->nullable();
            $table->json('long_description')->nullable();
            $table->json('features')->nullable();
            $table->json('proof_points')->nullable();
            $table->json('pain_points')->nullable();
            $table->json('process_steps')->nullable();
            $table->string('color', 30)->default('primary');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('channels');
    }
};
