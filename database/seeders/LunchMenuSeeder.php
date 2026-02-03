<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LunchMenu;

class LunchMenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            [
                'name' => 'Menu Turistico',
                'description' => 'Ideale per una pausa pranzo veloce e gustosa',
                'courses' => "Primo a scelta della casa\nSecondo con contorno\nAcqua naturale o frizzante\nCaffè",
                'price' => 15.00,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Menu Degustazione',
                'description' => 'Per chi vuole assaporare il meglio della nostra cucina',
                'courses' => "Antipasto del giorno\nPrimo a scelta\nSecondo di pesce con contorno\nDolce della casa\nAcqua e caffè inclusi\nCalice di vino locale",
                'price' => 25.00,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Menu Pizza',
                'description' => 'La tradizione napoletana a Vasto',
                'courses' => "Pizza a scelta (Margherita, Marinara, Diavola, Capricciosa)\nBibita o birra piccola\nCaffè",
                'price' => 12.00,
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($menus as $menu) {
            LunchMenu::create($menu);
        }
    }
}
