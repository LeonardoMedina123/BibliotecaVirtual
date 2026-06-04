<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class RemoveUserAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:remove-admin {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remueve el rol de administrador de un usuario';

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

        $user->rol = 'usuario';
        $user->save();

        $this->info("✓ El usuario '{$user->nombre}' ya no es administrador.");
        return 0;
    }
}
