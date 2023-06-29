<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
//debo importar la clase para el paginado ESTO por trabajar con Livewire
use Livewire\WithPagination;


class UsersIndex extends Component
{
    
    //invoco LO importado para el paginado
    use WithPagination;

    //para la searchBar
    public $search;
    
    //CON esto le indico q quiero trabajar la paginación con los estilos de bootstrap, NO con los de tailwing --> ESTO por trabajar con Livewire
    protected $paginationTheme = "bootstrap";

    public function render()
    {
        //aca recupero el listado de todos los users, paginado lo retorno
        $users = User::paginate(4);

        return view('livewire.users-index', compact('users'));
    }
}
