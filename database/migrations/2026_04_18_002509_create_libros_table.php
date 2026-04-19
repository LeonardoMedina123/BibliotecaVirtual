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
        Schema::create('libros', function (Blueprint $table) {
        $table->id('id_libros');
        $table->string('titulo', 150);
        $table->string('autor', 100);
        $table->string('editorial', 100);
        $table->string('portada_url')->nullable();
        // Llave foránea
        $table->foreignId('Categorias_id_categorias')
              ->constrained('categorias', 'id_categorias');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
