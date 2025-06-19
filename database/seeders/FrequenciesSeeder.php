<?php

namespace Database\Seeders;

use App\Models\Frequency;
use Illuminate\Database\Seeder;

class FrequenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     $frequencies = [
    //         ['id' => 1, 'frequency_name' => 'One_Time'],
    //         ['id' => 2, 'frequency_name' => 'Daily'],
    //         ['id' => 3, 'frequency_name' => 'Weekly'],
    //         ['id' => 4, 'frequency_name' => 'Monthly'],
    //         ['id' => 5, 'frequency_name' => 'Yearly'],
    //     ];

    //     Frequency::insert($frequencies);
    // }

    public function run(): void
    {
        $frequencies = ['Daily', 'Weekly', 'Monthly', 'Yearly'];
        foreach ($frequencies as $frequency) {
            Frequency::create(['freq' => $frequency]);
        }
    }
}
