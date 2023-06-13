<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //almaceno en una variable LA creación de los 100registros de posts
        $posts = Post::factory(300)->create();

        //itero la colección y creo para c/u una imagen -> con los datos q necesita para la relación id y type
        foreach($posts as $post){
            Image::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class
            ]);

            //lleno la tabla intermedia(post_tag) entre posts y tags
            $post->tags()->attach([
                rand(1, 4), //con el metodo attach agrego etiquetas, y con rand se agregan al azar
                rand(5, 8)
            ]);
        }
    }
}
