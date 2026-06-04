<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:make-admin {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convierte un usuario a administrador';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $user = User::where('correo', $email)->first();

        if (!$user) {
            $this->error("Usuario con email '$email' no encontrado.");
            return 1;
        }

        $user->rol = 'admin';
        $user->save();

        $this->info("✓ El usuario '{$user->nombre}' ahora es administrador.");
        return 0;
    }
}
