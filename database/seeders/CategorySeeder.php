<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'التكنولوجيا']);
        Category::create(['name' => 'الرياضة']);
        Category::create(['name' => 'السفر']);
        Category::create(['name' => 'الطبخ']);
        Category::create(['name' => 'العلوم']);
        Category::create(['name' => 'الأخبار']);
    }
}