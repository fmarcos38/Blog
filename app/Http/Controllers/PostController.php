<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    //metodo trae los post con status=2; --> este metodo retorna una vista
    public function index(){
        $posts = Post::where('status', 2)->latest('id')->paginate(8); //me traigo todos los pots con status 2.

        return view('posts.index', compact('posts')); //este metodo retorna una vista --> la tengo q crear
    }


    //metodo q retorna una vista con nombre post.show y se le pasa el registro post
    public function show(Post $post){

        $similares = Post::where('category_id', $post->category_id)
                            ->where('status', 2)
                            ->latest('id')
                            ->take(4)
                            ->get(); 

        return view('posts.show', compact('post', 'similares'));
    }


    //metodo para filtrar por categoría
    //el 1er parametro es el id del post Y el 2do el q viene en la funcion EL de la categoría
    public function category(Category $category){
        $posts = Post::where('category_id', $category->id)
                        ->where('status', 2)
                        ->latest('id') //ordena descend
                        ->paginate(4); //paginación de 6

        return view('posts.category', compact('posts', 'category')); //retorno una vista y le paso por param los post obtenidos, 
        //y la categoría.  
        //(debo crear la vista->post.category->en resource-->views-->post)

    }


    //metodo para obtener las tags de c/post
    public function tag(Tag $tag){
        $posts = $tag->posts()->where('status', 2)->latest('id')->paginate(4);

        return view('posts.tag', compact('posts', 'tag'));
    }

}
