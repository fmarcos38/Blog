<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$categories = Category::all();
        //return $categories;
        
        $categories = Category::pluck('name', 'id'); //este procedimiento es para obtener la info en el formato adecuado para mostrarla desde un SELECT en la vista.
        /* con el metodo "pluck" --> le doy el sgt formato (llave:valor) <--  A diferencia de lo q retorna el metodo all().
        {
            "1": "consequatur",
            "2": "quia",
            "3": "quas",
            "4": "qui"
        }
        */
        //return $categories;

        //recupero la colección de etiquetas
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    //Este metodo va a ejecutar previo a la creacíon del post las validaciones
    public function store(StorePostRequest $request)
    {
        //una vez llamado este metodo SE ejecuta --> StorePostRequest
        $post = Post::create($request->all());

        if($request->tags){ //si la info q quiero almac en la DB es de una Etiqueta entonces
            $post->tags()->attach($request->tags); //llamo al metodo q realiza la relacion muchos a muchos ENTRE post y etiqueta ES -->tags()
                                    //dentro del metodo attach(van los id de las etiquetas q selecciono en la vista a traves de los checkbox-->estos se guardaban en un array llamado tags)
        }

        return redirect()->route('admin.posts.edit', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        
    }
}
