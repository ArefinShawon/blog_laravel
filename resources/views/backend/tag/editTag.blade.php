@extends('backend.master')

@section('title', 'Edit Tag | Blog')

@section('content')
    <main>
        <div class="container-fluid">
            <h6 class="mt-4"></h6>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Edit Tag</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fas fa-tags mr-2"></i>Edit Tag Form
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('tag')}}">
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <select name="cat_id" id="cat_id" class="form-control">
                                @foreach($categories as $category)
                                <option value="{{ $category->cat_name }}"></option>

                                    <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tag</label>
                            <input class="form-control" type="text" name="tag_name" id="inputTagName" value="{{$tag->tag_name}}">
                        </div>
                        <div class="form-group">
                            <label>Publication Status</label>
                            <select name="status" class="form-control">
                                <option>--Select Publication Status--</option>
                                <option value="1" {{$tag->status ==1? 'Selected': ''}}>Published</option>
                                <option value="0" {{$tag->status==0? 'Selected': ''}}>Unpublished</option>
                            </select>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            <a href="{{url('tag')}}" class="btn btn-sm btn-danger"> Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
    </main>
@endsection
