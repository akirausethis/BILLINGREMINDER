<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $methods = ['Credit Card', 'Bank Transfer', 'Cash', 'Cryptocurrency', 'E-Wallet'];

        foreach ($methods as $method) {
            PaymentMethod::create(['paymeth' => $method]);
        }
    }
}
