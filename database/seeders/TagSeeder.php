<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create(['name' => 'مهم']);
        Tag::create(['name' => 'جديد']);
        Tag::create(['name' => 'مفيد']);
        Tag::create(['name' => 'ترفيه']);
        Tag::create(['name' => 'تعليمي']);
        Tag::create(['name' => 'حصري']);
        Tag::create(['name' => 'شائع']);
    }
}