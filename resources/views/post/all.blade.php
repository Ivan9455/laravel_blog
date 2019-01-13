{{--@forelse($posts as $post)--}}
    {{--<form class="form-horizontal post">--}}
        {{--<p>Author:{{$post->getUser()->name}}</p>--}}
        {{--<div>{{$post->content}}</div>--}}
        {{--<div class="post_status">--}}
            {{--<input type="button" class="btn btn-primary like status"--}}
                   {{--value="like : {{$post->getCountLike()}}"--}}
                   {{--data-post-id="{{$post->id}}"--}}
                   {{--data-status="1"--}}
                   {{--data-post-id_user="{{$post->id_user}}">--}}
            {{--<input type="button" class="btn btn-primary dizlike status"--}}
                   {{--value="dizlike: {{$post->getCountDislike()}}"--}}
                   {{--data-post-id="{{$post->id}}"--}}
                   {{--data-status="-1"--}}
                   {{--data-post="{{$post}}">--}}
            {{--<input type="button" class="btn btn-group" value="&#10150;">--}}
            {{--<div class="post_time">{{$post->created_at}}</div>--}}
        {{--</div>--}}
    {{--</form>--}}
{{--@empty--}}
    {{--<div>постов нет</div>--}}
{{--@endforelse--}}
@forelse($posts as $post)
    <br>
    {{$post->getContent()->text}}
    @empty
    <div>постов нет</div>
@endforelse
{{--{{dd($posts)}}--}}
