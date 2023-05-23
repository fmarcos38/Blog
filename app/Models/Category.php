<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /* declaro propiedad PARA la asignación masiva Q se usa para la creación */
    protected $fillable = ['name', 'slug'];

    /* RELACIONES */
    /* relación 1 a muchos con post */
    public function posts(){
        return $this->hasMany('App\Models\Post');
        //return $this->hasMany(Post::class); //otra forma
    }
}
