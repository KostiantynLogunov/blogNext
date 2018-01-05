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

                {{ $articles->links() }}

    </div><!-- /.blog-post -->
    <nav class="blog-pagination">
        {{--<a class="btn btn-outline-primary " href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>--}}
        <div class="row">
            @if($order == 'desc')
                <form action="{{ route('welcome.index') }}" method="get">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-outline-primary" href="#">Older</button>
                </form>

                <form action="{{ route('welcome.index', ['order' => 'asc']) }}" method="post">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-outline-secondary disabled" href="{{ route('welcome.index') }}">Newer</button>
                </form>
            @else
                <form action="{{ route('welcome.index') }}" method="get">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-outline-secondary disabled" href="#">Older</button>
                </form>

                <form action="{{ route('welcome.index', ['order' => 'asc']) }}" method="post">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-outline-primary" href="{{ route('welcome.index') }}">Newer</button>
                </form>
            @endif

        </div>

    </nav>
@endsection