@extends('layouts.app')

@section('content')
    @if($name === false)
        <div>данный пользовательне не существует</div>
    @else
        <div>user name: {{$name}}</div>
        @if($id!==false&&isset(Auth::user()->id)&&$id ===Auth::user()->id)
            <form class="form-horizontal post_store" method="post">
                {{csrf_field()}}
                <textarea name="content" class="post_content"></textarea>
                <input class="btn btn-group add" type="button" value="Create Post">
            </form>
        @endif
        <div class="post_all">

        </div>
    @endif


        <script src="{{asset('js/post.js')}}"></script>
        <script src="{{asset('js/script_post.js')}}"></script>
@endsection
