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
        Schema::create('adeudos', function (Blueprint $table) {
        $table->id('id_adeudos');
        $table->dateTime('fecha_limite');
        $table->foreignId('Libros_id_libros')->constrained('libros', 'id_libros');
        $table->foreignId('Usuarios_id_usuario')->constrained('users', 'id_usuario'); 
        $table->timestamps();});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adeudos');
    }
};
