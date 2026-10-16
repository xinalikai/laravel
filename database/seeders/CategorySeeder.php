<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Информационные технологии', 'Медицина', 'Космос', 'Наука'] as $name) {
            Category::create(['name' => $name]);
        }
    }
}