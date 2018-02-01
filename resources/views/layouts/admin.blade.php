
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('/img/favicon.ico') }}">

    <title>Admin panel</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>

<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/admin">DashBoard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" disabled>Settings</a>
                </li>
            </ul>

            <ul style="list-style: none">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Welcome, Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <a class="dropdown-item" href="{{ route('logout') }}">LogOut</a>
                    </div>
                </li></ul>
        </div>
    </nav>
</header>
@if(session()->has('success'))
    <div class="alert alert-success">
        <p>{!! session()->get('success')  !!}</p>
    </div>
@elseif(session()->has('error'))
    <div class="alert alert-danger">
        <p>{!! session()->get('error')  !!}</p>
    </div>
@endif

<div class="container-fluid">

    <div class="row">
        <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories') }}">Categories </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.index') }}">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users') }}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="" >Comments</a>
                </li>
            </ul>

            {{--<ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#">Nav item</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nav item again</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">One more nav</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Another nav item</a>
                </li>
            </ul>--}}
        </nav>

        @yield('content')

    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<!--<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>-->
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.2.1.js') }}"></script>
<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
@yield('js')
@include('inc.messages')
</body>
</body>
</html>
