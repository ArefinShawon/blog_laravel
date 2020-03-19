<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function categories(){
        return $this->belongsTo(Category::class,'cat_id');
    }
    public function tags(){
        return $this->belongsTo(Tag::class,'tag_id');
    }
}
