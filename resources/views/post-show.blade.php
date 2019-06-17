<h1>{{$post->title}}</h1>
<small>{{$post->author[0]->username}}</small>
<p>{{$post->body}}</p>

<p><a href="{{route('posts.edit'. $post)}}">Edit</a></p>

<form method="delete" action="{{route('posts.destroy', $post)}}">
    @csrf
    <input type="submit" value="Delete Post">
</form>

<h1>Comments Section</h1>
@if($post->comments)
    @foreach($post->comments as $comment)
        <p>{{$comment->body}}</p>
    @endforeach
@endif

<form method="post" action="{{route('comment.create')}}">
    @csrf
    <input type="text" name="comment" placeholder="Add your comment here">
    <input type="hidden" value="{{$post->id}}">
    <input type="submit">
</form>