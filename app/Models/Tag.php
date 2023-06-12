<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /* creo variable para la asignación masiva al momento de crear etiquetas */
    protected $fillable = ['name', 'slug', 'color'];

    /* metodo para q en la url en edit en ves de aparecer el ID de la categ aparezca el SLUG */
    public function getRouteKeyName()
    {
        return "slug";
    }

    /* relaciones */
    /* relacion muchos a muchos */
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
