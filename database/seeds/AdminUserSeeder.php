<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Garantizar que el rol 'admin' existe
        $adminRole = Role::where('Rol_name', 'admin')->first();
        
        if(!$adminRole){
             $adminRole = Role::create(['Rol_name' => 'admin']);
        }

        // 2. Crear el Usuario 'Super Admin'
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@plexbook.com',
            'password' => Hash::make('password123'), // Contraseña segura (hasheada)
            'role_id' => $adminRole->id, // Asignamos el ID del rol Admin
        ]);

        $this->command->info('Usuario Administrador creado con éxito!');
        $this->command->info('Email: admin@plexbook.com');
        $this->command->info('Password: password123');
    }
}
