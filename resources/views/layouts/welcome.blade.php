
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('/img/favicon.ico') }}">

    <title>Blog Next</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
</head>

<body>

<header>
    <div class="blog-masthead">
        <div class="container">
            <div class="row justify-content-between">
                <nav class="nav">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset('/img/favicon.ico')}}" width="40" height="40" class="d-inline-block my-1" alt="HomeBlogNext">
                    </a>
                    <a class="nav-link {{$home or ""}}" href="{{ url('/') }}">Home</a>
                    <a class="nav-link {{$coment or ""}}" href="{{ route('comments') }}">Comments</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/">All</a>
                            @foreach($categories as $category)
                                <form action="{{ route('welcome.index', ['category_id'=>$category->id]) }}" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="dropdown-item">{{ $category->title }}</button>
                                    {{--<a class="dropdown-item" href="#">{{ $category->title }}</a>--}}
                                </form>
                            @endforeach
                        </div>
                    </li>
                    <a class="nav-link {{$about or ""}}" href="{{ route('about') }}">About</a>

                </nav>

                @guest
                <div class="sig mt-3">
                    <a href="{{ route('login') }}"><button type="button" >Login</button></a>
                    <a href="{{ route('register') }}"><button type="button" >Registration</button></a>
                </div>
                @else
                    <ul style="list-style: none">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(\Illuminate\Support\Facades\Auth::user()->name)
                                Welcome, {{ \Illuminate\Support\Facades\Auth::user()->name }}
                            @else
                                Welcome, {{ \Illuminate\Support\Facades\Auth::user()->email }}
                            @endif
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            @if(\Illuminate\Support\Facades\Auth::user()->isAdmin)
                                <a class="dropdown-item" href="{{ route('admin') }}">Admins panel</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}">LogOut</a>
                        </div>
                    </li></ul>
                @endguest
            </div>
        </div>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success">
            <p>{!! session()->get('success')  !!}</p>
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">
            <p>{!! session()->get('error')  !!}</p>
        </div>
    @endif
    <div class="blog-header">
        <div class="container">
            <h1 class="blog-title">Blog Next</h1>
            <p class="lead blog-description">The blog Next for nice people</p>
        </div>
    </div>
</header>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            @yield('content')



        </div><!-- /.blog-main -->

        <aside class="col-sm-3 ml-sm-auto blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>About</h4>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            </div>
            <div class="sidebar-module">
                <h4>Archives</h4>
                <ol class="list-unstyled">
                    <li><a href="#">March 2017</a></li>
                    <li><a href="#">February 2017</a></li>
                    <li><a href="#">January 2017</a></li>
                    <li><a href="#">December 2017</a></li>
                    <li><a href="#">November 2017</a></li>
                    <li><a href="#">October 2017</a></li>
                    <li><a href="#">September 2017</a></li>
                    <li><a href="#">August 2017</a></li>
                    <li><a href="#">July 2017</a></li>
                    <li><a href="#">June 2017</a></li>
                    <li><a href="#">May 2017</a></li>
                    <li><a href="#">April 2017</a></li>
                </ol>
            </div>
            <div class="sidebar-module">
                <h4>Contact</h4>
                <ol class="list-unstyled">
                    <li><a href="https://github.com/KostiantynLogunov">GitHub</a></li>
                    <li><a href="https://plus.google.com/u/0/112136100480396485947">Google</a></li>
                    <li><a href="https://www.facebook.com/kostiantyn.logunov">Facebook</a></li>
                </ol>
            </div>
        </aside><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</main><!-- /.container -->

<footer class="blog-footer">
    <p>Blog built for you by <a href="https://www.facebook.com/kostiantyn.logunov">Kostiantyn</a>.</p>
    <p>
        <a href="#">Back to top</a>
    </p>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src=""{{ asset('js/jquery-3.2.1.js') }}""><\/script>')</script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
