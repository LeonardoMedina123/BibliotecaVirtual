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
    Schema::create('users', function (Blueprint $table) {
        // Laravel usa 'id' por defecto, pero si quieres 
        // respetar tu diagrama 'id_usuario', cámbialo aquí:
        $table->id('id_usuario'); 
        
        $table->string('nombre', 100);
        $table->string('correo', 100)->unique();
        $table->string('password', 255);
        
        // Campo 'rol' tipo ENUM como en tu diagrama
        $table->enum('rol', ['admin', 'bibliotecario', 'usuario'])->default('usuario');
        
        $table->timestamp('email_verified_at')->nullable();
        $table->rememberToken();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
