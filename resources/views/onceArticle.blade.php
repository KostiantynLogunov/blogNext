@extends('layouts.welcome')

@section('content')

    @if(isset($article))
        <div class="blog-post">

            <h2 class="blog-post-title">{{ $article->title }}</h2>
            <p class="blog-post-meta">{{ $article->created_at }} <a href="#">{{ $article->author }}</a></p>
            <p>{!! $article->short_text !!}</p>
            <hr>
            <p>
                {!! $article->full_text !!}
            </p>
            <br>

            <a href="{{ route('welcome.index') }}"><img src="{{asset('img/back.png')}}" alt="back" style="height: 60px"></a>
        </div><!-- /.blog-post -->

        @auth

            <form action="{{route('welcome.saveComment', ['$article_id' => $article->id])}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="text">Your comment:</label><br>
                    <textarea name="text" cols="70" rows="5" placeholder="You can write comment here.."></textarea><br>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        @else
            <b>If you want to write comment please login or registration</b>
        @endauth
            <br>
            <hr>
            @foreach($comments as $comment)
                <p>{{ $comment->text}}</p>
                @if(\App\Entities\User::find($comment->user_id))
                    <p style="font-size: small">Author: {{ \App\Entities\User::find($comment->user_id)->email}} <br>
                @endif
                 {{ $comment->created_at->format('d-m-Y H:i')}}</p>

                <hr>
            @endforeach
    @else
        dont have article
    @endif



@endsection