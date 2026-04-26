<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone', 30)->nullable();
            $table->string('company')->nullable();
            $table->string('channel', 30)->nullable();  // food_service|industry|export|retail
            $table->string('source', 30)->nullable();   // contact|quote|whatsapp
            $table->text('message')->nullable();
            $table->json('meta')->nullable();            // volumen, especie, destino, etc.
            $table->string('status', 20)->default('new'); // new|contacted|qualified|lost
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('contacted_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
