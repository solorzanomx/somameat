<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table): void {
            $table->id();
            $table->json('title');                        // translatable
            $table->json('slug');                         // translatable
            $table->json('meta_description')->nullable(); // translatable
            $table->json('content')->nullable();          // bloques JSON flexibles, translatable
            $table->string('template')->nullable();       // home|services|maquila|quality|about|contact
            $table->boolean('is_published')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
