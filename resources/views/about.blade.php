@extends('layouts.main')   

@section('container')
    <h1>About Me</h1>
    <h2>{{ $name }}</h2>
    <h2>{{ $old }}</h2>
    <img src="img/{{ $image }}" alt="">
@endsection
