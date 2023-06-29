<?php

namespace App\Observers;

use App\Models\Post;
//importo Storage
use Illuminate\Support\Facades\Storage;


class PostObserver
{
    //cambio de created a creating PARA q ocurra antes q se cree el post
    public function creating(Post $post): void
    {
        if(! \App::runningInConsole()){//Se ejecuta lo del if SI es q no estoy ejecutando dsd la consola
            //esto lo q hace es q c/vez q se cree un nuevo post SE le asigne el id del user logueado/autenticado
            $post->user_id = auth()->user()->id;
        }        
    }

    //este evento se ejecutará ANTES de elim el post --> por eso lo cambio de delete a deleting
    public function deleting(Post $post): void
    {
        if($post->image){
            Storage::delete($post->image->url);
        }
    }

}
