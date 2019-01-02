@forelse($posts as $post)
    <p>
        {{$post->content}} | {{$post->created_at}} <br>
        like :{{$post->like}} dizlike: {{$post->dizlike}}
    </p>
@empty
    <div>постов нет</div>
@endforelse

