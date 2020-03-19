<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'cat_name', 'cat_desc', 'status'
    ];

    public function tags(){
        return $this->hasMany(Tag::class);
    }
    public function blogs(){
        return $this->hasMany(Blog::class);
    }
}
