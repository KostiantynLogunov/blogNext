@extends('layouts.welcome')

@section('content')

    @foreach($comments as  $comment)
        <p>for article: <b><a href="{{ route('welcome.show',['id'=>$comment->article_id]) }}">{{ \App\Entities\Article::find($comment->article_id)->title }}</a></b></p>
        <p>Coment:
            <span class="text-warning">{{$comment->text}}</span>
        </p>
        <hr>
    @endforeach
    <br>

    <a href="{{ route('welcome.index') }}"><img src="{{asset('img/back.png')}}" alt="back" style="height: 60px"></a>
@endsection