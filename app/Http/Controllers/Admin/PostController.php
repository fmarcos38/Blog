<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
//este USE es para la manipulacion de la img Mueve la img de la carpeta temp a la carpeta q corresponde
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //retorno una vista
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
        //con este codigo veo a donde va la img q envio
        //return $request->file('file');  
        
        //una vez llamado este metodo SE ejecuta --> StorePostRequest
        $post = Post::create($request->all());

        if($request->file('file')){
            $url = Storage::put('posts', $request->file('file')); //param 1 DONDE quiero q se guarde, PARAM 2 donde está.

            //genero la relación para la tabla correspondiente
            //y creo el item en la tabla image --> debo habilitar la asignación masiva en dicho modelo
            $post->image()->create([
                'url' => $url,
            ]);
        }

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
        //Regla de autorización
        //llamo a la policy q cree 
        $this->authorize('author', $post);


        $categories = Category::pluck('name', 'id'); //este procedimiento es para obtener la info en el formato adecuado para mostrarla desde un SELECT en la vista.
        // con el metodo "pluck" --> le doy el sgt formato (llave:valor) <--  A diferencia de lo q retorna el metodo all().
        
        //recupero la colección de etiquetas
        $tags = Tag::all();


        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    //Le asigno el tipo StorePostRequest --> q cont las validaciones(es el q cree para la vista crear )
    public function update(StorePostRequest $request, Post $post)
    {
        //Regla de autorización
        //llamo a la policy q cree 
        $this->authorize('author', $post);


        $post->update($request->all());

        //pregunto si vienen un arch de imagen
        if($request->file('file')){
            $url = Storage::put('post', $request->file('file')); //aca tengo la nueva url de la nueva img

            //pregunto si él post YA contaba co una imagen --> SI es así elim la img del servidor
            if($post->image){
                Storage::delete($post->image->url);//eliminé la vieja

                $post->image->update([
                    'url' => $url //actualicé la url con la antes creada
                ]);
            }else{//sino tiene imagen el post a modif--> creo una con la url creada debajo del primer if
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }
    
        if($request->tags){ //si la info q quiero almac en la DB es de una Etiqueta entonces
            $post->tags()->sync($request->tags); //llamo al metodo q realiza la relacion muchos a muchos ENTRE post y etiqueta ES -->tags()
                                    //dentro del metodo attach(van los id de las etiquetas q selecciono en la vista a traves de los checkbox-->estos se guardaban en un array llamado tags)
        }

        return redirect()->route('admin.posts.edit', $post)->with("el post se actualizó con exito");
    }

    /**
     * Remove the specified resource from storage.
     */
    //desde aquí Realizo la logica para el btn delete DE la lista de posts
    public function destroy(Post $post)
    {
        //Regla de autorización
        //llamo a la policy q cree 
        $this->authorize('author', $post);

        
        $post->delete();
        
        return redirect()->route('admin.posts.index', $post)->with("el post se eliminó con exito");
    }
}
