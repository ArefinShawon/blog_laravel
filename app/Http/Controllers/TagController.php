<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::with('categories')->get();

//        return $products;
        return view('backend.tag.tag',[
            'tags'=>$tags
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
        return view('backend.tag.addTag',[
            'categories'=>$categories
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
        $tag = new Tag();
        $tag->cat_id = $request->cat_id;
        $tag->tag_name = $request->tag_name;
        $tag->status = $request->status;
        $tag->save();

        return back()->with('message', 'Tag saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        $categories = Category::where('status',1)->get();
        return view('backend.tag.editTag',[
            'tag' => $tag,
            'categories'=>$categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);

        $tag->cat_id = $request->cat_id;
        $tag->tag_name = $request->tag_name;
        $tag->status = $request->status;
        $tag->save();

        return back()->with('message', 'Tag updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag -> delete();
        return back();
    }
    public function unpublishTag($id){
        $tag = Tag::find($id);
        $tag->status=0;
        $tag->save();
        return back()->with('message', $tag->tag_name.' is now changed to UNPUBLISHED status');
    }
    public function publishTag($id){
        $tag = Tag::find($id);
        $tag->status=1;
        $tag->save();
        return back()->with('message', $tag->tag_name.' is now changed to PUBLISHED status');
    }
}
