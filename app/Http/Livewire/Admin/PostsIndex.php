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

        $posts = Post::where('user_id', 1/* auth()->user()->id */)
                    ->where('name', 'LIKE', '%' . $this->search . '%')
                    ->latest('id')
                    ->paginate(1);/* compara el id deluser q creo el post, con el del user logeado, y pagino el array q me devuelve */
                    
        return view('livewire.admin.posts-index', compact('posts'));
    }
}
