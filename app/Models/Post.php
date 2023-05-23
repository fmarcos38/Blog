<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

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
