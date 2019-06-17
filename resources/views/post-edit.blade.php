@error('title')
    {{$message}}
@enderror
@error('body')
    {{$message}}
@enderror

<form method="post" action="{{route('posts.update', $post)}}">
    @csrf
    <input type="text" name="title" value="{{$post->title}}">
    <input type="text" name="body" value="{{$post->body}}">
    <input type="submit">
</form>