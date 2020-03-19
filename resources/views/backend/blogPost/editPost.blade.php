@extends('backend.master')

@section('title', 'Add Blog Post | Blog')

@section('content')
    <main>
        <div class="container-fluid">
            <h6 class="mt-4"></h6>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add New Blog Post</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-list-alt mr-2"></i>Blog Post Form
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('blog')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <select name="cat_id" id="cat_id" class="form-control">
                                <option value="">--Select Category--</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tag</label>
                            <select name="tag_id" id="tag_id" class="form-control">
                                <option value="">--Select Tag--</option>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Post Title</label>
                            <input class="form-control" type="text" name="post_title" placeholder="Enter Post Title">
                        </div>
                        <div class="form-group">
                            <label>Post Description</label>
                            <textarea class="form-control" name="post_desc" id="summary-ckeditor" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Post Image</label>
                            <input type="file" class="form-control" name="post_img" id="imgInp"><img id="blah" width="100">
                        </div>
                        <div class="form-group">
                            <label>Post Author</label>
                            <input class="form-control" type="text" name="post_author" placeholder="Enter Post Title">
                        </div>
                        <div class="form-group">
                            <label>Publication Status</label>
                            <select name="status" class="form-control">
                                <option>--Select Publication Status--</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                            <a href="{{url('blog')}}" class="btn btn-sm btn-danger"> Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
