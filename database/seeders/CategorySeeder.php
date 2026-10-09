<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Информационные технологии', 'slug' => 'it'],
            ['name' => 'Медицина',                   'slug' => 'medicine'],
            ['name' => 'Космос',                     'slug' => 'space'],
            ['name' => 'Наука',                      'slug' => 'science'],
        ];

        foreach ($categories as $c) {
            Category::create($c);
        }
    }
}