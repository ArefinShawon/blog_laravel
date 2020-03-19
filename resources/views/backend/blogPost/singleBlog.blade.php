@extends('backend.master')

@section('title', 'Blog Post | Blog')

@section('content')
    <main>
        <div class="container-fluid">
            <h6 class="mt-4"></h6>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Blog Post</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fab fa-product-hunt"></i> Post Table
                    <a href="{{url('blog/create')}}" class="btn btn-sm btn-info float-right">
                        <i class="fas fa-plus mr-2"></i>Add Post
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Category Name</th>
                                <th>Tag name</th>
                                <th>Post Title</th>
                                <th>Post Image</th>
                                <th>Publication Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Sl.</th>
                                <th>Category Name</th>
                                <th>Tag name</th>
                                <th>Post Title</th>
                                <th>Post Image</th>
                                <th>Publication Date</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i = 1)
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$blog->categories->cat_name}}</td>
                                    <td>{{$blog->tags->tag_name}}</td>
                                    <td><a href="">{{$blog->post_title}}</a></td>
                                    <td><img src="{{asset($blog->post_img)}}" alt="" height="50"></td>
                                    <td>{{$blog->created_at}}</td>
                                    <td>
                                        @if($blog->status == 1)
                                            <a href="{{route('unpublished-blog',['id'=>$blog->id])}}" class="btn btn-sm btn-info" title="Published" onclick="return confirm('Do you really want to change to Unpublish?')">
                                                <i class="fa fa-arrow-up"></i>
                                            </a>
                                        @else
                                            <a href="{{route('published-blog',['id'=>$blog->id])}}" class="btn btn-sm btn-warning" title="Unpublished" onclick="return confirm('Do you really want to change to Publish?')">
                                                <i class="fa fa-arrow-down"></i>
                                            </a>
                                        @endif
                                        <a href="{{url('blog/'.$blog->id)}}" class="btn btn-sm btn-secondary">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                        <a href="{{url('blog/'.$blog->id.'/edit')}}" class="btn btn-sm btn-success">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{url('blog/'.$blog->id)}}" class="btn btn-sm btn-danger" onclick="event.preventDefault();document.getElementById('delete-form').submit();">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="delete-form" action="{{ url('blog/'.$blog->id) }}" method="post" style="display: none;">
                                            @csrf
                                            @METHOD('delete')
                                        </form>
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
