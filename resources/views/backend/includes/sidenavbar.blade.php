<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{url('/home')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="{{route('category')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                    Category
                </a>
                <a class="nav-link" href="{{url('tag')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                    Tag
                </a>
                <a class="nav-link" href="{{url('blog')}}">
                    <div class="sb-nav-link-icon"><i class="fab fa-product-hunt"></i></div>
                    Post
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as: </div>
            <i class="fas fa-user"></i> {{ucfirst(Auth::user()->name)}}
        </div>
    </nav>
</div>
