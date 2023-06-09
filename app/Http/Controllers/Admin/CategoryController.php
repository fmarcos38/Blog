<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //declaro reglas de validación
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',  //categories ES la tabla en la q quiero q sea unico
        ]);

        /* creo la nueva categoría */
        $category = Category::create($request->all());

        return redirect()->route('admin.categories.edit', $category)->with('info', 'La categoría se creo con exito');; //redirecciono a una ruta

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //declaro reglas de validación
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:categories,slug,$category->id",  //categories ES la tabla en la q quiero q sea unico
        ]);

        $category->update($request->all()); //actualizo la data

        return redirect()->route('admin.category.edit', $category)->with('info', 'La categoría se actualizó con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('info', 'La categoría se eliminó con exito');;
    }
}
