<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table): void {
            $table->id();
            $table->string('company_name');
            $table->string('rfc', 20)->nullable();
            $table->string('contact_name');
            $table->string('email')->unique();
            $table->string('phone', 30)->nullable();
            $table->string('channel', 30)->default('food_service'); // food_service|industry|export|retail
            $table->string('country', 5)->default('MX');
            $table->text('notes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
