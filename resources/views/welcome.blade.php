@extends('layouts.app')

@section('content')
    <div class="posts">
        <h1 class="text-center">Лучшее за:</h1>
        <div class="btn-group btn-group-toggle m-0-100" data-toggle="buttons">
            <label class="btn btn-secondary active">
                <input type="radio" name="options" id="option1" autocomplete="off" checked> Неделю
            </label>
            <label class="btn btn-secondary">
                <input type="radio" name="options" id="option2" autocomplete="off"> Месяц
            </label>
            <label class="btn btn-secondary">
                <input type="radio" name="options" id="option3" autocomplete="off"> Год
            </label>
            <label class="btn btn-secondary">
                <input type="radio" name="options" id="option4" autocomplete="off"> Все время
            </label>
        </div>
        <div class="post_all">

        </div>
        <input type="button" class="btn btn-info m-auto  post_load" value="load_post">
    </div>
    <script src="{{asset('js/post.js')}}"></script>
    <script src="{{asset('js/script_post_best.js')}}"></script>
@endsection
