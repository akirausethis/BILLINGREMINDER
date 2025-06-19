<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     $types = [
    //         ['id' => 1, 'type_name' => 'Meeting'],
    //         ['id' => 2, 'type_name' => 'Bill'],
    //         ['id' => 3, 'type_name' => 'Task'],
    //         ['id' => 4, 'type_name' => 'Assignment'],
    //     ];

    //     Type::insert($types);
    // }

    public function run(): void
    {
        $types = ['Entertainment', 'Bill', 'HouseHold', 'Health','Education','Tax','Technology'];

        foreach ($types as $type) {
            Type::create(['typ' => $type]);
        }
    }
}
