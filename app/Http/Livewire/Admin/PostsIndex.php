<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination; /* para paginación  */

/* este componente lo q hace es renderizar una vista */
class PostsIndex extends Component
{
    
    use WithPagination; /* para la paginación */
    
    protected $paginationTheme = "bootstrap"; /* le digo q utilice los estilos de bootstrap para los estilos de la paginación */
    
    public $search; /* esta prpiedad search se sincroniza con el input de busqueda en la vista */

    public function updatingSearch(){/* reseta a la pagina 1 al buscar posisionada en la 2 */
        $this->resetPage();
    }

    public function render()
    {

        /* recupero los posts q le corresponden al user logeado */
        $posts = Post::where('user_id', 1/* auth()->user()->id */)
                    ->where('name', 'LIKE','%' . $this->search . '%')//este items es para la busqda del post EN la searchBar
                    ->latest('id') 
                    ->paginate(2);//pagina de a 2 posts
                    
        return view('livewire.admin.posts-index', compact('posts'));
    }
}
