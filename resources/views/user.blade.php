@extends('layouts.app')

@section('content')
    @if($name === false)
        <div>данный пользовательне не существует</div>
    @else
        <div>user name: {{$name}}</div>
        <form method="post" action="{{route('user.post.store')}}">

        </form>
    @endif

@endsection
