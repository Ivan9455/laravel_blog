@forelse($posts as $post)
    <form class="form-horizontal">
        {{$post->content}} | {{$post->created_at}} <br>
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
    </form>
@empty
    <div>постов нет</div>
@endforelse

