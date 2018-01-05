@extends('layouts.admin')

@section('content')
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>Add crticle</h1>
        <br>
        <form action="{{ route('articles.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Enter title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="">Choose category</label>
                <select class="form-control" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{$category->id or ""}}">
                            {{$category->title or ""}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Enter Short text </label>
                <textarea name="short_text" class="form-control" cols="30" rows="5"></textarea>
            </div>

            <div class="form-group">
                <label for="">Enter Full text </label>
                <textarea name="full_text" class="form-control" cols="30" rows="5"></textarea>
            </div>

            <div class="form-group">
                <label for="">Enter Author </label>
                <textarea name="author" class="form-control" cols="30" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-success float-right">Save</button>
        </form>
    </main>
@endsection