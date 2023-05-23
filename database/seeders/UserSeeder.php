<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //genero mis credenciales
        User::create([
            'name' => 'Marcos Forastiere',
            'email' => 'fmarcos_23@hotmail.com',
            'password' => bcrypt('123456789')
        ]);
        //genero 99registros falsos
        User::factory(99)->create();
    }
}
