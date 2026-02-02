<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MenuCategory;
use App\Models\MenuItem;

class MenuItemSeeder extends Seeder
{
    private function seedCategory($categoryName, $items){
        // Recuperare la categoria specificata
        $category = MenuCategory::where('name', $categoryName)->firstOrFail();
        // Inserire gli elementi del menu nel database
        foreach ($items as $item) {
            MenuItem::firstOrCreate(
                ['name' => $item['name'], 'category_id' => $category->id],
                ['price' => $item['price'], 'ingredients' => $item['ingredients'] ?? null]
            );
            
        }
    }
        /**
     * 
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->seedCategory('Antipasti', [
            ['name' => 'Fantasia di bruschette', 'price' => 6.00],
            ['name' => 'Caprese di bufala DOP', 'price' => 10.00],
            ['name' => 'Pepata di cozze', 'price' => 10.50],
            ['name' => 'Soutè di cozze', 'price' => 10.50],
            ['name' => 'Insalata di mare', 'price' => 10.00],
            ['name' => 'Cozze ripiene alla vastese', 'price' => 12.50],
            ['name' => 'Pallotte cacio e uova', 'price' => 11.50],
            ['name' => 'Misto mare Don Magnifico', 'ingredients' => 'antipasti di pesce caldi e freddi', 'price' => 19.00],
            ['name' => 'Tagliere salumi e formaggi', 'ingredients' => 'per 2/3 persone', 'price' => 18.00],
            ['name' => 'Tagliere Don Magnifico', 'ingredients' => 'con prodotti tipici del territorio: ventricina, pecorino e salsiccia stagionata per 2 persone', 'price' => 22.00],
        ]);
        $this->seedCategory('Primi Piatti', [
            ['name' => 'Pasta fresca ai frutti di mare', 'price' => 15.00],
            ['name' => 'Mezzi paccheri al pesto di zucchine','ingredients' => 'con mazzancolle sgusciate e calamaretti', 'price' => 16.00],
            ['name' => 'Gnocchi alle vongole','ingredients' => 'chiedere disponibilità', 'price' => 14.50],
            ['name' => 'Troccoli alla ventricina', 'price' => 14.50],
            ['name' => 'Raviolini al pomodoro', 'price' => 12.00],
            ['name' => 'Ravioli ripieni alla ventricina', 'ingredients' => 'al sugo di pomodoro con stracciata molisana', 'price' => 16.00],
        ]);
        $this->seedCategory('Secondi Piatti', [
            ['name' => 'Spiedini di calamari panati', 'ingredients' => 'servito con contorno di verdure', 'price' => 14.50],
            ['name' => 'Filetto di tonno alla piastra','ingredients' => 'servito con contorno di verdure', 'price' => 16.50],
            ['name' => 'Polpette di tonno', 'price' => 13.50],
            ['name' => 'Parmigiana di mare', 'price' => 14.50],
            ['name' => 'Frittura di calamari', 'price' => 16.00],
            ['name' => 'Frittura di calamari e gamberi', 'price' => 16.00],
            ['name' => 'Grigliata mista di pesce', 'ingredients' => 'con pesce fresco del nostro mare - CHIEDERE DISPONIBILITÀ', 'price' => 22.00],
            ['name' => 'Brodetto alla vastese', 'ingredients' => 'per 2 persone - CHIEDERE DISPONIBILITÀ', 'price' => 65.00],
            ['name' => 'Tagliata di petto di pollo', 'price' => 12.50],
            ['name' => 'Hamburger di scottona gr.220', 'ingredients' => 'servito con patatine fritte', 'price' => 13.50],
            ['name' => 'Cotoletta con patatine fritte', 'price' => 11.00],

        ]);
    }
}
