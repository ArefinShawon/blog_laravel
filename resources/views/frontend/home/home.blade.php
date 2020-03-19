@extends('frontend.master')

@section('title', 'Blog | Home')

@section('content')
    <div class="slider">
        <header>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide One - Set the background image for this slide in the line below -->
                    <div class="carousel-item active" style="background-image: url('https://source.unsplash.com/szFUQoyvrxM/1920x1080')">
                        <div class="carousel-caption d-md-block">
                            <h2 class="display-4">First Slide</h2>
                            <p class="lead">This is a description for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item" style="background-image: url('https://source.unsplash.com/LAaSoL0LrYs/1920x1080')">
                        <div class="carousel-caption d-md-block">
                            <h2 class="display-4">Third Slide</h2>
                            <p class="lead">This is a description for the third slide.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </header>

        <!-- Page Content -->
        <section class="py-5 align-content-center">
            <div class="container">
                <h1 class="display-4">Full Page Image Slider</h1>
                <p class="lead">The background images for the slider are set directly in the HTML using inline CSS.</p>
            </div>
        </section>
    </div>
    <!-- /.container -->
    <div class="container">
        <div class="row text-center">
            @foreach($blogs as $blog)
            <div class="col-lg-3 col-md-6 mb-4 shadow-sm">
                <div class="card h-100">
                    <img class="card-img-top" src="{{asset($blog->post_img)}}" height="200px" alt="">
                    <div class="card-body shadow-sm">
                        <h4 class="card-title">{{$blog->post_title}}</h4>
                        <p class="card-text small">{{str_limit($blog->post_desc)}}</p>

                    </div>
                    <div class="card-footer shadow-sm">
                        <a href="{{url('blog-post/'.$blog->id.'/'.str_slug($blog->post_title))}}" class="">Continue reading</a>
                        <hr>
                        <p class="small">
                            By {{$blog->post_author}} at {{\Carbon\Carbon::parse($blog->created_at)->format('D,d M Y')}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
