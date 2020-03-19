@extends('backend.master')

@section('title', 'Category | Blog')

@section('content')
    <main>
        <div class="container-fluid">
            <h6 class="mt-4"></h6>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Category</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-list-alt mr-2"></i>Category Table
                    <a href="{{route('add-category')}}" class="btn btn-sm btn-info float-right">
                        <i class="fas fa-plus mr-2"></i>Add Category
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Sl.</th>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i = 1)
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$category->cat_name}}</td>
                                    <td>{{$category->cat_desc}}</td>
                                    <td>{{$category->status == 1? 'Published':'Unpublished'}}</td>
                                    <td>
                                        @if($category->status == 1)
                                            <a href="{{route('unpublished-category',['id'=>$category->id])}}" class="btn btn-sm btn-info" onclick="return confirm('Do you really want to change to Unpublish?')">
                                                <i class="fa fa-arrow-up"></i>
                                            </a>
                                        @else
                                            <a href="{{route('published-category',['id'=>$category->id])}}" class="btn btn-sm btn-warning" onclick="return confirm('Do you really want to change to Publish?')">
                                                <i class="fa fa-arrow-down"></i>
                                            </a>
                                        @endif
                                        <a href="{{route('edit-category',['id'=>$category->id])}}" class="btn btn-sm btn-success">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('delete-category',['id'=>$category->id ])}}" class="btn btn-sm btn-danger" onclick="return confirm('Do you really want to Delete?')">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
