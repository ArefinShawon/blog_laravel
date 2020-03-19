<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('categories','tags')->get();
        return view('backend.blogPost.singleBlog',[
            'blogs' => $blogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status',1)->get();
        $tags = Tag::where('status',1)->get();
        return view('backend.blogPost.addPost',[
            'categories'=>$categories,
            'tags' =>$tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postimg= $request->file('post_img');
        $imageName = $postimg->getClientOriginalName();
        $directory = 'backend-assets/images/post-images/';
        $imageUrl = $directory.$imageName;
        $postimg->move($directory, $imageName);

        $blog = new Blog();
        $blog->cat_id = $request->cat_id ;
        $blog->tag_id = $request->tag_id ;
        $blog->post_title = $request->post_title ;
        $blog->post_desc = $request->post_desc ;
        $blog->post_img =$imageUrl ;
        $blog->post_author = $request->post_author ;
        $blog->status = $request->status ;
        $blog->save();

        return back()->with('message', 'Post saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Brand::find($id);
        return view('backend.blogPost.editPost',[
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }

    public function unpublishBlog($id){
        $blog = Blog::find($id);
        $blog->status=0;
        $blog->save();
        return back()->with('message','Post is now changed to UNPUBLISHED status');
    }
    public function publishBlog($id){
        $blog = Blog::find($id);
        $blog->status=1;
        $blog->save();
        return back()->with('message','Post is now changed to PUBLISHED status');
    }
}
