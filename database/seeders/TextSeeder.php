<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Text;
use App\Models\User;
use Illuminate\Database\Seeder;

class TextSeeder extends Seeder
{
    public function run(): void
    {
        $it       = Category::where('name', 'Информационные технологии')->first();
        $medicine = Category::where('name', 'Медицина')->first();
        $space    = Category::where('name', 'Космос')->first();

        $admin      = User::where('login', 'admin')->first();
        $journalist = User::where('login', 'journalist')->first();

        Text::create([
            'heading'     => 'Открытие нового телескопа',
            'text'        => 'Учёные запустили орбитальный телескоп для изучения дальних галактик.',
            'category_id' => $space->id,
            'user_id'     => $journalist->id,
        ]);

        Text::create([
            'heading'     => 'Прорыв в медицине',
            'text'        => 'Разработана вакцина нового поколения против сезонных вирусов.',
            'category_id' => $medicine->id,
            'user_id'     => $journalist->id,
        ]);

        Text::create([
            'heading'     => 'Новый язык программирования',
            'text'        => 'Представлен язык, ориентированный на безопасность и скорость.',
            'category_id' => $it->id,
            'user_id'     => $admin->id,
        ]);
    }
}