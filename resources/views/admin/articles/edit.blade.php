@extends('layouts.admin')

@section('content')
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>Editing article</h1>
        <br>
        <form method="post" action="{{ route('articles.update', ['id' => $article->id]) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <label for="">Enter title</label>
                <input type="text" name="title" class="form-control" value="{{ $article->title }}">
            </div>

            <div class="form-group">
                <label for="">Enter text </label>
                <textarea name="short_text" class="form-control" cols="30" rows="5">
                    {!! $article->short_text !!}
                </textarea>
            </div>

            <div class="form-group">
                <label for="">Enter Short text </label>
                <textarea name="full_text" class="form-control" cols="30" rows="5">
                    {!! $article->full_text !!}
                </textarea>
            </div>

            <div class="form-group">
                <label for="">Enter Full text </label>
                <textarea name="author" class="form-control" cols="30" rows="5">
                    {!! $article->author !!}
                </textarea>
            </div>

            <button href="" type="submit" class="btn btn-success float-right">Save</button>
        </form>
    </main>
@endsection