<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Relacion uno a muchos inversa Post-Usuario.
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relación uno a muchos inversa Post-category.
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //Relación muchos a muchos post-tag
    public function tags(){
        return $this->belongsToMany(Tag::class);   
    }

    //Relación uno a uno polimórfica
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
