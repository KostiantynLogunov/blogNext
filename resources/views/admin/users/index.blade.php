@extends('layouts.admin')

@section('content')
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>Users List</h1>
        <br><br><br><br>
        <table class="table table-bordered table-hover">
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>is Admin</th>
                <th>Date</th>
                <th>Do</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td><b>{{ $user->email }}</b></td>
                    <td>
                        {{ $user->isAdmin  ? 'Yes' : 'No'}}
                    </td>
                    <td>{!! $user->created_at->format('d-m-Y H:i') !!}</td>
                    <td>
                        <a href="{{ route('users.sendMsg', ['id' => $user->id]) }}">Send msg</a> ||
                        <a href="{{ route('users.delete', ['id' => $user->id]) }}">Delete</a>
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
