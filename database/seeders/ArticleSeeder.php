<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $it       = Category::where('slug', 'it')->first();
        $medicine = Category::where('slug', 'medicine')->first();
        $space    = Category::where('slug', 'space')->first();

        Article::create([
            'title'       => 'Открытие нового телескопа',
            'content'     => 'Учёные запустили орбитальный телескоп для изучения дальних галактик.',
            'category_id' => $space->id,
            'author'      => 'Иван Петров',
        ]);

        Article::create([
            'title'       => 'Прорыв в медицине',
            'content'     => 'Разработана вакцина нового поколения против сезонных вирусов.',
            'category_id' => $medicine->id,
            'author'      => 'Анна Смирнова',
        ]);

        Article::create([
            'title'       => 'Новый язык программирования',
            'content'     => 'Представлен язык, ориентированный на безопасность и скорость.',
            'category_id' => $it->id,
            'author'      => 'Сергей Иванов',
        ]);

        Article::create([
            'title'       => 'Квантовые вычисления',
            'content'     => 'Крупная компания анонсировала 1000-кубитный процессор.',
            'category_id' => $it->id,
            'author'      => 'Анна Смирнова',
        ]);
    }
}