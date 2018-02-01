@extends('layouts.welcome')

@section('content')
    There are info about us: <br>
    Contact: ...<br>
    Team: ... <br>
    General info: ... <br>
    Other info: ... <br>
    <br>
    <hr>
    <a href="{{ route('welcome.index') }}"><img src="{{asset('img/back.png')}}" alt="back" style="height: 60px"></a>
@endsection