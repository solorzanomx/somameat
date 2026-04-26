<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('case_studies', function (Blueprint $table): void {
            $table->id();
            $table->json('title');                   // translatable
            $table->json('slug');                    // translatable
            $table->json('summary')->nullable();     // translatable
            $table->json('body')->nullable();        // translatable (bloques de contenido)
            $table->string('client_name')->nullable();
            $table->string('channel')->nullable();   // food_service|industry|export|retail
            $table->json('metrics')->nullable();     // [{label, value, unit}]
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('case_studies');
    }
};
