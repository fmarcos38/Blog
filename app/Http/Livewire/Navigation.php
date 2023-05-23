<?php

namespace App\Http\Livewire;

use Livewire\Component;
/* importo el modelo Category */
use App\Models\Category;

class Navigation extends Component
{

    public function render()
    {
        /* guardo en una variabl todas las categorias */
        $categories = Category::all();
        
        return view('livewire.navigation', compact('categories'));
    }
}
