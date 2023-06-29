<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
//importo este paquete para la creación de la carpeta posts en -> 'public\storage\' para almacenar las imagenes
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //con este comando al ejecutar los seeders no se me duplican las imagenes
        Storage::deleteDirectory('posts'); //NO funcionó LA BORRE a mano
        //llamo al Facade antes importado PARA crear la carpeta posts
        Storage::makeDirectory('posts'); //NO funcionó LA cree a mano

        //con este comando al ejecutar los seedes SE CREAN los pemisos en la DB
        $this->call(RoleSeeder::class);

        //desde acá llamo al seeder PARA q se llene la DB con usuarios
        $this->call(UserSeeder::class);

        //este para categorías
        Category::factory(4)->create();

        //creo etiquetas
        Tag::factory(8)->create();

        //creo posts
        $this->call(PostSeeder::class);
        
    }    

}
