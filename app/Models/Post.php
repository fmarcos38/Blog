<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /* habilito la asignación masiva Q es para almacenar los datos en la DB */
    //tamb puedo definir la asig masiva con ---->protected filabled<---------(PERO tendría q declarar TODOS los elemntos q quiero q se llenen
    // Q son muchos más q los q NO..)
    protected $guarded = [
        //acá van los campos q NO quiero q se llenen por asig masiva.
        'id', 'created_at', 'updated_at'
    ];

    /* RELACIONES */
    /* relación 1 a muchos inversa con user */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /* relación 1 a muchos inversa con category */
    public function category(){
        return $this->belongsTo(Category::class);
    }

    /* relacion muchos a muchos */
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    
    /* relacion 1a1 polimorfica con Images */
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
