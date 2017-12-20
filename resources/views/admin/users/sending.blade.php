@extends('layouts.admin')

@section('content')
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>Send mail to user  {{ $user->email }}</h1>
        <br><br><br><br>

        <form action="#" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">{{ $user->email }}</label> <br>
                <textarea name="text" cols="90" rows="10" placeholder="Good day, ..."></textarea>
            </div>

            <button type="submit" class="btn btn-success">Send</button>
        </form>
    </main>
@endsection

