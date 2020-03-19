@extends('backend.master')

@section('title', 'Edit Category | Blog')

@section('content')
    <main>
        <div class="container-fluid">
            <h6 class="mt-4"></h6>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Edit Category</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-list-alt mr-2"></i>Category Edit Form
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('update-category')}}">
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" type="text" name="cat_name" value="{{$category->cat_name}}">
                            <input type="hidden" class="form-control" value="{{$category->id}}" name="id">
                        </div>
                        <div class="form-group">
                            <label>Category Description</label>
                            <input class="form-control" type="text" name="cat_desc" value="{{$category->cat_desc}}">
                        </div>
                        <div class="form-group">
                            <label>Publication Status</label>
                            <select name="status" class="form-control">
                                <option>--Select Publication Status--</option>
                                <option value="1" {{$category->status ==1? 'Selected': ''}}>Published</option>
                                <option value="0" {{$category->status==0? 'Selected': ''}}>Unpublished</option>
                            </select>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            <a href="{{url('category')}}" class="btn btn-sm btn-danger"> Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
    </main>
@endsection
