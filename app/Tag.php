<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function categories(){
        return $this->belongsTo(Category::class,'cat_id');
    }
    public function blogs(){
        return $this->hasMany(Blog::class);
    }
}
