@forelse($posts as $post)
    <form class="form-horizontal post">
        <div>{{$post->content}}</div>
        <div class="post_status">
            <input type="button" class="btn btn-primary like status"
                   value="like : {{$post->like}}"
                   data-post-id="{{$post->id}}"
                   data-status="1"
                   data-post-id_user="{{$post->id_user}}">
            <input type="button" class="btn btn-primary dizlike status"
                   value="dizlike: {{$post->dizlike}}"
                   data-post-id="{{$post->id}}"
                   data-status="-1"
                   data-post="{{$post}}">
            <input type="button" class="btn btn-group" value="&#10150;">
            <div class="post_time">{{$post->created_at}}</div>
        </div>
    </form>
@empty
    <div>постов нет</div>
@endforelse

