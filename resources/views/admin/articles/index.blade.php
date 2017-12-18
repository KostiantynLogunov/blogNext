@extends('layouts.admin')

@section('content')
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>List of Articles</h1>
        <br>
        <a class="btn btn-info" href="{{ route('articles.create') }}">Add new article</a>
        <br><br>
        <table class="table table-bordered table-hover">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Short text</th>
                <th>Full text</th>
                <th>Author</th>
                <th>Date</th>
                <th>Do</th>
            </tr>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td><b>{{ $article->title }}</b></td>
                    <td>{!! substr($article->short_text, 0, 100) !!} ...</td>
                    <td>{!! substr($article->full_text, 0, 200) !!} ...</td>
                    <td>{!! $article->author !!}</td>
                    <td>{!! $article->created_at->format('d-m-Y H:i') !!}</td>
                    <td>
                        <a href="{{ route('articles.edit', $article->id) }}">Edit</a> ||
                        <form action="{{ route('articles.destroy', $article) }}" method="post">
                            <input type="hidden" name="_method" value="delete">
                            {{csrf_field()}}
                            {{--<a type="submit">/</a>--}}
                            <button type="submit">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </table>
    </main>
@endsection

{{--
@section('js')
    <script>
        $(function () {
            $(".delete").on('click', function () {
                if (confirm("Are you sure you want to delete article ?")) {
                    let id = $(this).attr("rel");
                    $.ajax({
                        type: "DELETE",
                        url: "{!! route('categories.delete') !!}",
                        data: {_token: "{{csrf_token()}}", id:id},
                        complete: function () {
                            alert("Category was delete");
                            location.reload();
                        }
                    });
                } else {
                    alertify.error("CANCELED");
                }
            });
        });
    </script>
@stop--}}
