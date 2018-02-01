<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
</head>

<body>

<div class="container">


    <form class="form-signin" method="post">
        @if(session()->has('success'))
            <div class="alert alert-success">
                <p>{!! session()->get('success')  !!}</p>
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">
                <p>{!! session()->get('error')  !!}</p>
            </div>
        @endif
        {{ csrf_field() }}
        <h2 class="form-signin-heading">Please login</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember" value="1"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            <br>
            <div class="text-center margin-bottom-20" id="uLogin"
                 data-ulogin="display=panel;theme=flat;fields=first_name,last_name,email;
                             providers=facebook,vkontakte,odnoklassniki,mailru;hidden=other;
                             redirect_uri={{ urlencode('http://blognext/') }}/ulogin;mobilebuttons=0;">
            </div>

    </form>
    {{-- Social buttons--}}



    {{--@section('js')--}}
        <script src="{{ asset('js/ulogin.js') }}"></script>
    {{--@endsection--}}

</div> <!-- /container -->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
@include('inc.messages')
</body>
</html>