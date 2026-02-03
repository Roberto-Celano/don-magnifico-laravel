<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MenuCategory;
use App\Models\MenuItem;

class MenuItemSeeder extends Seeder
{
    private function seedCategory($categoryName, $items)
    {
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
            ['name' => 'Mezzi paccheri al pesto di zucchine', 'ingredients' => 'con mazzancolle sgusciate e calamaretti', 'price' => 16.00],
            ['name' => 'Gnocchi alle vongole', 'ingredients' => 'chiedere disponibilità', 'price' => 14.50],
            ['name' => 'Troccoli alla ventricina', 'price' => 14.50],
            ['name' => 'Raviolini al pomodoro', 'price' => 12.00],
            ['name' => 'Ravioli ripieni alla ventricina', 'ingredients' => 'al sugo di pomodoro con stracciata molisana', 'price' => 16.00],
        ]);
        $this->seedCategory('Secondi Piatti', [
            ['name' => 'Spiedini di calamari panati', 'ingredients' => 'servito con contorno di verdure', 'price' => 14.50],
            ['name' => 'Filetto di tonno alla piastra', 'ingredients' => 'servito con contorno di verdure', 'price' => 16.50],
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
        $this->seedCategory('Insalatone', [
            ['name' => 'Insalata Verde', 'price' => 5.00],
            ['name' => 'Insalata Mista', 'price' => 6.50],
            ['name' => 'Mozart', 'ingredients' => 'insalata mista, zucchine grigliate, pomodorini pachino, olive nere', 'price' => 8.50],
            ['name' => 'Rossini', 'ingredients' => 'insalata verde, pomodorini pachino, mais, tonno, mozzarella, olive nere', 'price' => 10.50],
            ['name' => 'Puccini', 'ingredients' => 'insalata mista, pomodorini pachino, petto di pollo grigliato, scaglie di parmigiano', 'price' => 10.50],
        ]);
        $this->seedCategory('Pizze Rosse', [
            ['name' => 'Marinara', 'ingredients' => 'pomodoro, origano, aglio', 'price' => 6.50],
            ['name' => 'Napoli', 'ingredients' => 'pomodoro, acciughe, origano, mozzarella', 'price' => 8.00],
            ['name' => 'Margherita', 'ingredients' => 'pomodoro, mozzarella, basilico', 'price' => 7.50],
            ['name' => 'Cotto', 'ingredients' => 'pomodoro, mozzarella, prosciutto cotto', 'price' => 8.50],
            ['name' => 'Diavola', 'ingredients' => 'pomodoro, mozzarella, salsiccia fresca piccante', 'price' => 9.50],
            ['name' => 'Prosciutto e funghi', 'ingredients' => 'pomodoro, mozzarella, prosciutto cotto, funghi champignon', 'price' => 9.00],
            ['name' => 'Quattro stagioni', 'ingredients' => 'pomodoro, mozzarella, funghi champignon, olive nere, carciofini, prosciutto cotto', 'price' => 10.00],
            ['name' => 'Capricciosa', 'ingredients' => 'pomodoro, mozzarella, funghi champignon, carciofini, olive nere, salsiccia', 'price' => 10.00],
            ['name' => 'Regina Margherita', 'ingredients' => 'pomodoro, mozzarella di bufala DOP, basilico', 'price' => 10.00],
            ['name' => 'Frutti di mare', 'ingredients' => 'pomodoro, prezzemolo, frutti di mare', 'price' => 14.00],
        ]);
        $this->seedCategory('Pizze Bianche', [
            ['name' => 'Focaccina', 'ingredients' => 'olio EVO, origano', 'price' => 4.50],
            ['name' => 'Tedesco', 'ingredients' => 'mozzarella, patatine fritte, wurstel', 'price' => 9.50],
            ['name' => 'Quattro formaggi', 'ingredients' => 'mozzarella, gorgonzola, stracchino, emmental', 'price' => 10.50],
            ['name' => 'Corsara', 'ingredients' => 'mozzarella, patate, salsiccia fresca', 'price' => 10.00],
            ['name' => 'Super ortolana', 'ingredients' => 'mozzarella, melanzane, zucchine, peperoni, carote e funghi stufati al forno', 'price' => 9.50],
        ]);
        $this->seedCategory('Pizze Speciali', [
            ['name' => 'Tosca', 'ingredients' => 'mozzarella di bufala DOP, pomodorini pachino, basilico', 'price' => 11.00],
            ['name' => 'Nabucco', 'ingredients' => 'mozzarella, friarielli, salsiccia', 'price' => 11.00],
            ['name' => 'Puritani', 'ingredients' => 'pomodoro, mozzarella, ventricina nostrana, carciofini', 'price' => 12.00],
            ['name' => 'Cenerentola', 'ingredients' => 'pomodoro, mozzarella di bufala DOP, pomodorini pachino, ricotta salata, basilico', 'price' => 11.50],
            ['name' => 'Bohème', 'ingredients' => 'mozzarella, stracchino, pomodorini pachino, melanzane grigliate, zucchine grigliate', 'price' => 11.50],
            ['name' => 'Guglielmo Tell', 'ingredients' => 'mozzarella, radicchio, gorgonzola, noci, stracchino', 'price' => 11.50],
            ['name' => 'Aida', 'ingredients' => 'mozzarella, prosciutto crudo, rucola, formaggio grana', 'price' => 11.50],
            ['name' => 'Macbeth', 'ingredients' => 'mozzarella, funghi champignon, funghi porcini, speck', 'price' => 12.00],
            ['name' => 'Cavalleria Rusticana', 'ingredients' => 'mozzarella di bufala DOP, salsiccia nostrana, rucola, ricotta salata', 'price' => 12.50],
            ['name' => 'Rigoletto', 'ingredients' => 'pomodoro, mozzarella, gorgonzola, peperoni arrosto, alici, ventricina', 'price' => 13.00],
            ['name' => 'La zozza di Don Magnifico', 'ingredients' => 'mozzarella, patate, salsiccia nostrana, funghi porcini, speck, crema di tartufo', 'price' => 13.00],
            ['name' => 'Norma', 'ingredients' => 'mozzarella di bufala DOP, pomodorini pachino, datterino giallo, burrata, basilico', 'price' => 14.00],
            ['name' => 'Madama Butterfly', 'ingredients' => 'mozzarella di bufala DOP, stracchino, salmone affumicato, rucola', 'price' => 14.00],
            ['name' => 'La Favorita', 'ingredients' => 'mozzarella, crema di pistacchio, mortadella, stracciatella', 'price' => 14.50],
            ['name' => 'Pescatori di perle', 'ingredients' => 'mozzarella, crema di zucchine, mazzancolle sgusciate, calamaretti, pomodorini pachino, stracciata molisana', 'price' => 17.00],
        ]);
        $this->seedCategory('Pizze Baby', [
            ['name' => 'Grande Puffo', 'ingredients' => 'pomodoro, mozzarella', 'price' => 6.50],
            ['name' => 'Peppa Pig', 'ingredients' => 'mozzarella, patatine fritte, prosciutto cotto', 'price' => 9.50],
            ['name' => 'Pluto', 'ingredients' => 'mozzarella, patatine fritte, wurstel', 'price' => 7.00],
        ]);
        $this->seedCategory('Friggitoria', [
            ['name' => 'Patatine fritte', 'price' => 5.00],
            ['name' => 'Patatine fritte fellate', 'price' => 6.00],
            ['name' => 'Olive ascolane', 'ingredients' => '6 pz.', 'price' => 4.50],
            ['name' => 'Chele di granchio', 'ingredients' => '4 pz.', 'price' => 4.50],
            ['name' => 'Crocchete di patate', 'ingredients' => '6 pz.', 'price' => 4.50],
            ['name' => 'Fiore di zucca', 'ingredients' => '1 pz.', 'price' => 2.00],
            ['name' => 'Verdure pastellate', 'price' => 6.50],
            ['name' => 'Anelli di cipolla', 'ingredients' => '7 pz.', 'price' => 4.50],
            ['name' => 'Misto fritto', 'ingredients' => '2 olive ascolane, 2 crocchette di patate, 2 chele di granchio, patatine fritte e verdure pastellate', 'price' => 8.00],
        ]);
        $this->seedCategory('Dessert', [
            ['name' => 'Cremino allo zafferano', 'ingredients' => 'con crumble alla cannella e riduzione ai frutti di bosco', 'price' => 5.50],
            ['name' => 'Tiramisù', 'price' => 5.50],
            ['name' => 'Panna cotta ai frutti di bosco', 'price' => 5.50],
            ['name' => 'Mousse al pistacchio', 'price' => 6.50],
            ['name' => 'Sorbetto al limone', 'ingredients' => 'servito in flute', 'price' => 3.50],
            ['name' => 'Sorbetto al San Pasquale', 'ingredients' => 'servito in flute', 'price' => 4.00],
            ['name' => 'Dolce del pizzaiolo', 'ingredients' => 'Angioletti con nutella e zucchero a velo per 2/3 persone', 'price' => 10.00],
        ]);
        $this->seedCategory('Bevande', [
            ['name' => 'Acqua Naturale lt.1', 'price' => 2.50],
            ['name' => 'Acqua Frizzante lt.1', 'price' => 2.50],
            ['name' => 'Coca Cola cl.33', 'price' => 3.00],
            ['name' => "Coca Cola '0' cl.33", 'price' => 3.00],
            ['name' => 'Fanta cl.33', 'price' => 3.00],
            ['name' => 'Sprite cl.33', 'price' => 3.00],
            ['name' => 'Estathè pesca cl.33', 'price' => 3.00],
            ['name' => 'Estathè limone cl.33', 'price' => 3.00],
            ['name' => 'Cocktail San Pellegrino', 'price' => 4.00],
            ['name' => 'Crodino', 'price' => 4.00],
            ['name' => 'Chinotto', 'price' => 4.00],
            ['name' => 'Aperol/Campari Spritz', 'price' => 6.00],
        ]);
        $this->seedCategory('Bevande alla Spina', [
            ['name' => 'Coca Cola cl.20', 'price' => 2.50],
            ['name' => 'Coca Cola cl.40', 'price' => 4.50],
        ]);

        $this->seedCategory('Birra alla Spina', [
            ['name' => 'Birra bionda Heineken cl.20', 'price' => 2.50],
            ['name' => 'Birra bionda Heineken cl.40', 'price' => 5.00],
            ['name' => 'Birra bionda Heineken lt.1', 'price' => 10.00],
            ['name' => 'Birra bionda Heineken lt.1,5', 'price' => 15.00],
        ]);
        $this->seedCategory('Birra in Bottiglia', [
            ['name' => "Beck's cl.33", 'price' => 4.00],
            ['name' => 'Paulaner Weisse cl.50', 'price' => 5.50],
            ['name' => 'Moretti La Bianca cl.33', 'price' => 4.50],
            ['name' => 'Paulaner Salvator cl.33', 'price' => 4.50],
            ['name' => 'Ichnusa cl.50', 'price' => 5.00],
            ['name' => 'Messina Cristalli di sale cl.33', 'price' => 4.50],
        ]);
        $this->seedCategory('Digestivi', [
            ['name' => 'Caffé', 'price' => 1.50],
            ['name' => 'Liquori', 'price' => 3.50],
            ['name' => 'Amari', 'price' => 3.50],
            ['name' => 'Grappa Bianca/Barricata', 'price' => 3.50],
            ['name' => 'San Pasquale', 'price' => 4.00],
        ]);
        // ALLERGENI (price = 0.00 per compatibilità col DB)
        $this->seedCategory('Allergeni', [
            ['name' => '1. GLUTINE', 'price' => 0.00],
            ['name' => '2. CROSTACEI', 'price' => 0.00],
            ['name' => '3. UOVA', 'price' => 0.00],
            ['name' => '4. PESCE', 'price' => 0.00],
            ['name' => '5. ARACHIDI', 'price' => 0.00],
            ['name' => '6. SOIA', 'price' => 0.00],
            ['name' => '7. LATTE', 'price' => 0.00],
            ['name' => '8. FRUTTA A GUSCIO', 'price' => 0.00],
            ['name' => '9. SEDANO', 'price' => 0.00],
            ['name' => '10. SENAPE', 'price' => 0.00],
            ['name' => '11. SEMI DI SESAMO', 'price' => 0.00],
            ['name' => '12. ANIDRIDE SOLFOROSA', 'price' => 0.00],
            ['name' => '13. LUPINI', 'price' => 0.00],
            ['name' => '14. MOLLUSCHI', 'price' => 0.00],
        ]);

        // VINI - POLLUTRO
        $this->seedCategory('Vini Pollutro', [
            ['name' => "Cerasuolo d'Abruzzo DOC cl.75", 'price' => 15.50],
            ['name' => "Chardonnay Terre di Chieti IGT cl.75", 'price' => 15.50],
            ['name' => "Falanghina Terre di Chieti IGT cl.75", 'price' => 15.50],
        ]);

        // VINI - DON VENANZIO
        $this->seedCategory('Vini Don Venanzio', [
            ['name' => "Montepulciano d'Abruzzo DOC cl.75", 'price' => 16.00],
            ['name' => "Rosato Don Venanzio IGT cl.75", 'price' => 16.00],
            ['name' => "Pecorino Terre di Chieti IGT cl.75", 'price' => 16.00],
        ]);

        // VINI - OTHERS
        $this->seedCategory('Vini Others', [
            ['name' => "Prosecco cl.75", 'price' => 16.50],
            ['name' => "Mosso bianco frizzante cl.75", 'price' => 17.00],
            ['name' => "Calice vino Rosso/Rosato/Bianco", 'price' => 4.00],
            ['name' => "Calice prosecco", 'price' => 4.00],
        ]);

        $this->seedCategory('Coperto', [
            ['name' => 'Coperto', 'price' => 2.50],
        ]);
        $this->seedCategory('Aggiunte', [
            [
                'name' => 'Stracciata, burrata, salmone affumicato',
                'price' => 2.50
            ],
            [
                'name' => 'Prosciutto crudo, speck, mozzarella di bufala DOP, ventricina',
                'price' => 2.00
            ],
            [
                'name' => 'Altre aggiunte',
                'price' => 1.00
            ],
        ]);
    }
}
