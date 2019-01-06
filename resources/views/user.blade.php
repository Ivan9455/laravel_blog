@extends('layouts.app')

@section('content')
    <div class="posts">
        @if($name === false)
            <div class="user_name">данный пользовательне не существует</div>
        @else
            <div class="user_name">user name: {{$name}}</div>
            @if($id!==false&&isset(Auth::user()->id)&&$id ===Auth::user()->id)
                <div class="post_store" >
                    {{csrf_field()}}
                    <textarea name="content" class="post_content"></textarea>
                    <div class="add_block">
                        <input class="btn btn-group add" type="button" value="&#10148;">
                    </div>
                </div>
            @endif
            <div class="post_all">

            </div>
            <input type="button" class="btn btn-info m-auto  post_load" value="load_post">
        @endif
    </div>

    <script src="{{asset('js/post.js')}}"></script>
    <script src="{{asset('js/script_post.js')}}"></script>
@endsection
