@for($i = 0;$i<count($posts);$i++)
    <form class="form-horizontal post">
        <div>{{$posts[$i]->content}}</div>
        <div class="post_status">
            <input type="button" class="btn btn-primary like status"
                   value="like : {{$posts[$i]->count_like}}"
                   data-post-id="{{$posts[$i]->id}}"
                   data-status="1"
                   data-post-id_user="{{$posts[$i]->id_user}}">
            <input type="button" class="btn btn-primary dizlike status"
                   value="dislike: {{$posts[$i]->count_dislike}}"
                   data-post-id="{{$posts[$i]->id}}"
                   data-status="-1"
                   data-post-id_user="{{$posts[$i]->id_user}}">
            <input type="button" class="btn btn-group" value="&#10150;">
            <div class="post_time">{{$posts[$i]->created_at}}</div>
        </div>
    </form>
@endfor
@if(empty($posts))
    <div>постов нет</div>
@endif



