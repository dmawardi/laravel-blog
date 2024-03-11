@extends('layout')

@section('content')
    <h1>{{$post->title}}</h1>
    <div>
        {!!$post->body!!}
    </div>
   
    <a href="/">Go Back</a>
@endsection