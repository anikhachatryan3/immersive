@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- @foreach($users as $user)
                    <p>{{$user->name}}</p>
                    <p>{{$user->email}}</p>
                    @endforeach --}}
                    @if(count($posts) < 1)
                        <p>No Posts Created</p>
                    @else
                        @foreach($posts as $post)
                    <p><a href="{{route('posts.show', $post)}}">{{$post->title}}</a></p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
