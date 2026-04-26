<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table): void {
            $table->id();
            $table->json('name');                      // translatable
            $table->json('slug');                      // translatable
            $table->json('description')->nullable();   // translatable
            $table->string('sku', 50)->unique()->nullable();
            $table->string('species', 30);             // bovino|porcino|pollo|ovino|pescado
            $table->string('cut_type')->nullable();
            $table->string('packaging')->nullable();
            $table->string('unit', 20)->default('kg');
            $table->decimal('min_order', 8, 2)->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
