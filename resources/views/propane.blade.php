@extends('welcome')

@section('section')
    <h1>Hello</h1>
    <form action="">
        <input type="text">
    </form>

    <h1>{{env('APP_NAME')}}</h1>
@endsection
