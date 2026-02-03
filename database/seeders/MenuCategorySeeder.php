<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MenuCategory;

class MenuCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Definire le categorie di menu con le loro posizioni
        $categories = [
            'Antipasti',
            'Primi Piatti',
            'Secondi Piatti',
            'Insalatone',
            'Pizze Rosse',
            'Pizze Bianche',
            'Pizze Speciali',
            'Pizze Baby',
            'Friggitoria',
            'Dessert',
            'Bevande',
            'Bevande alla Spina',
            'Birra alla Spina',
            'Birra in Bottiglia',
            'Digestivi',
            'Vini Pollutro',
            'Vini Don Venanzio',
            'Vini Others',
            'Aggiunte',
            'Coperto',
            'Allergeni',
        ];

        // Inserire le categorie nel database con la posizione corretta
        foreach ($categories as $index => $category) {
            MenuCategory::firstOrCreate(['name' => $category], ['position'=> $index +1]);
        }
    }
}