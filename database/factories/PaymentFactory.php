<?php
namespace Database\Factories;

use App\Models\Payment;
use App\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'payment_amount' => $this->faker->randomFloat(2, 10000, 1000000), // Nilai random
            'payment_date' => $this->faker->dateTimeBetween('-30 days', 'now'), // Tanggal random
            'payment_method_id' => PaymentMethod::factory(), // Relasi ke factory PaymentMethod
        ];
    }
}