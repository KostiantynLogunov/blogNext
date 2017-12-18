@extends('layouts.admin')

@section('content')
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>Add category</h1>
        <br>
        <form method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Enter title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="">Enter text </label>
                <textarea name="description" class="form-control" cols="30" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-success float-right">Save</button>
        </form>
    </main>
@endsection