<?php

namespace Database\Seeders;

use App\Models\Reminder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RemindersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        Reminder::factory()->count(1000)->create([
            'user_id' => 1, 
            'type_id' => 1, 
            'frequency_id' => 1, 
            'category_id' => 1,
            'payment_method_id' => 1
        ]);
    }
    
}