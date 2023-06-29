<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    //metodo par evitar q un user cambie el id delpost en la vista/url de editar
    //este metodo es LLAMADO desde Controllers-->Admin-->PostController
    public function author(User $user, Post $post){ //debo retornar un booleano

        if($user->id == $post->user_id){ //pregunto si el id del user logueado es el mismo del q creo el post
            return true;
        }else{
            return false;
        }

    }


    //metodo para q desde la vista/url donde se ven todos los post (no la q lista los post) SINO en la q se ve la imagen La principal
    //y solo se vean los post Publicados y NO se pueda poner por url uno q está en estado borrador
    //este metodo es LLAMADO desde Controllers-->PostController
    //coloco el ? delante de User para q sea un parametro opcional-->entoncs SINO estas logueado igual podes ver los post
    public function published(?User $user, Post $post){

        if($post->status == 2){
            return true;
        }else{
            return false;
        }
    }
}
