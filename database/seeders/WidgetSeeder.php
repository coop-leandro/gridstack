<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Widget;

class WidgetSeeder extends Seeder
{
    public function run()
    {
        Widget::create([
            'name' => 'Widget 1',
            'position' => [1, 1],
        ]);

        Widget::create([
            'name' => 'Widget 2',
            'position' => [2, 1],
        ]);

        Widget::create([
            'name' => 'Widget 3',
            'position' => [3, 1],
        ]);
    }
}
