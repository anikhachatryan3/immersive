@foreach($users as $user)
    {{$user->name}}
    {{$user->email}}
    
    @foreach($user->hats as $hat)
        {{$hat->name}}
    @endforeach

@endforeach
