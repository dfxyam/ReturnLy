<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('found_item_id')->constrained('found_items')->cascadeOnDelete();
            
            // Informasi Pengklaim
            $table->string('claimant_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('class_name')->nullable();
            
            // Bukti Kepemilikan
            $table->text('proof_description');
            $table->string('proof_photo')->nullable();
            
            // Status & Tracking
            $table->string('claim_number')->unique();
            $table->enum('status', ['Pending', 'Disetujui', 'Ditolak'])->default('Pending');
            $table->text('admin_notes')->nullable();
            $table->timestamp('processed_at')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};