@extends('backend.master')

@section('title', 'Add Category | Blog')

@section('content')
    <main>
        <div class="container-fluid">
            <h6 class="mt-4"></h6>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add New Category</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-list-alt mr-2"></i>Category Form
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('save-category')}}">
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control @error('cat_name') is-invalid @enderror" type="text" name="cat_name" id="inputCatName" placeholder="Enter Category Name">
                            @error('cat_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Category Description</label>
                            <input class="form-control @error('cat_desc') is-invalid @enderror" type="text" name="cat_desc" id="inputCatDesc" placeholder="Enter Short Category Description">
                            @error('cat_desc')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group @error('status') is-invalid @enderror">
                            <label>Publication Status</label>
                            <select name="status" class="form-control">
                                <option>--Select Publication Status--</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                            @error('status')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                            <a href="{{url('category')}}" class="btn btn-sm btn-danger"> Cancel</a>
                        </div>
                    </form>
                </div>
        </div>
    </main>
@endsection
