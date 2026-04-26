<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table): void {
            $table->id();
            $table->string('number', 20)->unique();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->string('status', 20)->default('draft'); // draft|confirmed|processing|shipped|delivered|cancelled
            $table->text('notes')->nullable();
            $table->date('requested_delivery_at')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
