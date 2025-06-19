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
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // ID transaksi pembayaran
            $table->foreignId('payment_method_id') // Relasi ke payment_methods
                  ->constrained('payment_methods') // Foreign key constraint
                  ->onDelete('cascade'); // Hapus pembayaran jika metode dihapus
            $table->decimal('payment_amount', 10, 2); // Jumlah pembayaran
            $table->dateTime('payment_date'); // Tanggal pembayaran
            $table->timestamps(); // Timestamps
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};