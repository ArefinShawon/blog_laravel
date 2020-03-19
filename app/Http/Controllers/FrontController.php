<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        $categories = Category::where('status',1)->get();
        $blogs = Blog::orderBy('created_at','desc')->where('status',1)->get();
        return view('frontend.home.home',[
            'categories'=>$categories,
            'blogs' =>$blogs
        ]);
    }
    public function frontcategory($id){
        $categories = Category::where('status',1)->get();
        $categoryPost = Blog::where('cat_id',$id)->where('status',1)->get();
        return view('frontend.blogPost.blogPost',[
            'categories'=>$categories,
            'categoryPost'=>$categoryPost
        ]);
    }
    public function frontpost($id){
        $blog = Blog::with('categories','tags')->find($id);
        return view('frontend.blogPost.singlePost',[
            'blog'=>$blog
        ]);
    }

}

