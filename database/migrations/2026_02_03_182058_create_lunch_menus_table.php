<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lunch_menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // es. "Menu Turistico", "Menu Degustazione"
            $table->text('description')->nullable();  // descrizione breve
            $table->text('courses');  // piatti inclusi (JSON o testo)
            $table->decimal('price', 6, 2);  // prezzo
            $table->boolean('is_active')->default(true);  // attivo/non attivo
            $table->integer('sort_order')->default(0);  // ordine visualizzazione
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lunch_menus');
    }
};
