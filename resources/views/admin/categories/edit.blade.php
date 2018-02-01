@extends('layouts.admin')

@section('content')
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>Editing category</h1>
        <br>
        <form method="post" action="{{ route('saveEdit', ['id' => $category->id]) }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Enter title</label>
                <input type="text" name="title" class="form-control" value="{{ $category->title }}">
            </div>

            <div class="form-group">
                <label for="">Enter text </label>
                <textarea name="description" class="form-control" cols="30" rows="5">
                    {!! $category->description !!}
                </textarea>
            </div>
            <button type="submit" class="btn btn-success float-right">Save</button>
        </form>
    </main>
@endsection