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
        Schema::create('beb_partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');                          // Nome del B&B
            $table->string('contact_name')->nullable();      // Nome referente
            $table->string('phone')->nullable();             // Telefono
            $table->string('email')->nullable();             // Email
            $table->string('code')->unique();                // Codice univoco (es. GRANDHOTEL)
            $table->enum('discount_type', ['percentage', 'fixed'])->default('percentage');
            $table->decimal('discount_value', 8, 2);         // Valore sconto
            $table->boolean('is_active')->default(true);     // Attivo/Disattivo
            $table->date('valid_from')->nullable();          // Valido dal
            $table->date('valid_until')->nullable();         // Valido fino al
            $table->text('notes')->nullable();               // Note interne
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beb_partners');
    }
};
