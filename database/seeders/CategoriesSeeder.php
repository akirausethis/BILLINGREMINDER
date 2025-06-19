<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     $categories = [
    //         ['id' => 1, 'category_type' => 'Expense'],
    //         ['id' => 2, 'category_type' => 'Investment'],
    //         ['id' => 3, 'category_type' => 'Saving'],
    //         ['id' => 4, 'category_type' => 'Loan'],
    //         ['id' => 5, 'category_type' => 'Debt'],
    //     ];

    //     Category::insert($categories);
    // }

    public function run(): void
    {
        $categories = ['Expense', 'Investment', 'Saving', 'Loan', 'Debt'];
        foreach ($categories as $category) {
            Category::create(['cat' => $category]);
        }
    }
}
