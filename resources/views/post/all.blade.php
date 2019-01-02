@forelse($posts as $post)
    <p>{{$post->content}} | {{$post->created_at}}</p>
@empty
    <div>постов нет</div>
@endforelse
