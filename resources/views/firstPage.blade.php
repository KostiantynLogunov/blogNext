@extends('layouts.welcome')

@section('content')
    <div class="blog-post">
        @foreach($articles as $article)
            <h2 class="blog-post-title">{{ $article->title }}</h2>
            <p class="blog-post-meta">{{ date('d-m-Y', strtotime($article->created_at)) }} <a href="#">{{ $article->author }}</a></p>
            <p>{!! $article->short_text !!}</p>
            <a href="{{ route('welcome.show', ['id'=>$article->id]) }}"> Read more ...</a>
            <hr>
            <br>
        @endforeach
    </div><!-- /.blog-post -->
    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>
@endsection