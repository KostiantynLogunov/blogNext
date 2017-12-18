@extends('layouts.admin')

@section('content')
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>List of Categories</h1>
        <br>
        <a class="btn btn-info" href="{{ route('categories.add') }}">Add new category</a>
        <br><br>
        <table class="table table-bordered table-hover">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>
                <th>Do</th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{!! $category->description !!}</td>
                    {{--<td>{!! $category->created_at !!}</td>--}}
                    <td>{!! $category->created_at->format('d-m-Y H:i') !!}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}">Edit</a> ||
                        {{--<a href="{{ route('categories.delete') }}">Delete</a>--}}
                        <a href="javascript:;" class="delete" rel="{{ $category->id }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </main>
@endsection

@section('js')
    <script>
        $(function () {
            $(".delete").on('click', function () {
                if (confirm("Are you sure you want to delete category?")) {
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
@stop