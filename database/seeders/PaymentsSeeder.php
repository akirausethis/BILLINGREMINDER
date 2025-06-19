<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\PaymentMethod;

class PaymentsSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua metode pembayaran dari tabel `payment_methods`
        $paymentMethods = PaymentMethod::all();

        foreach ($paymentMethods as $method) {
            Payment::create([
                'payment_method_id' => $method->id, // Referensi ke metode pembayaran
                'payment_amount' => rand(10000, 1000000),
                'payment_date' => now()->subDays(rand(0, 30)),
            ]);
        }
    }
}