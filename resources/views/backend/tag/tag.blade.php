@extends('backend.master')

@section('title', 'Tag | Blog')

@section('content')
    <main>
        <div class="container-fluid">
            <h6 class="mt-4"></h6>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Tag</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fas fa-tags mr-2"></i>Tag Table
                    <a href="{{url('tag/create')}}" class="btn btn-sm btn-info float-right">
                        <i class="fas fa-plus mr-2"></i>Add Tag
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
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Sl.</th>
                                <th>Category Name</th>
                                <th>Tag name</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i = 1)
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$tag->categories->cat_name}}</td>
                                    <td>{{$tag->tag_name}}</td>
                                    <td>{{$tag->status == 1? 'Published':'Unpublished'}}</td>
                                    <td>
                                        @if($tag->status == 1)
                                            <a href="{{route('unpublished-tag',['id'=>$tag->id])}}" class="btn btn-sm btn-info" onclick="return confirm('Do you really want to change to Unpublish?')">
                                                <i class="fa fa-arrow-up"></i>
                                            </a>
                                        @else
                                            <a href="{{route('published-tag',['id'=>$tag->id])}}" class="btn btn-sm btn-warning" onclick="return confirm('Do you really want to change to Publish?')">
                                                <i class="fa fa-arrow-down"></i>
                                            </a>
                                        @endif
                                        <a href="{{url('tag/'.$tag->id.'/edit')}}" class="btn btn-sm btn-success">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{url('tag/'.$tag->id)}}" class="btn btn-sm btn-danger" onclick="event.preventDefault();
document.getElementById('delete-form').submit();">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="delete-form" action="{{ url('tag/'.$tag->id) }}" method="post" style="display: none;">
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
