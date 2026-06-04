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
        Schema::create('libro_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id_usuario')
              ->constrained('users', 'id_usuario')
              ->onDelete('cascade');
              
            // Conexión con la tabla libros (id_libros)
            $table->foreignId('libro_id_libros')
              ->constrained('libros', 'id_libros')
              ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libro_user');
    }
};
