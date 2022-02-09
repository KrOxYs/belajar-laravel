@extends('layouts.main')

@section('container')
    <h1>Product</h1>
    @foreach ($barang as $item)
        <h5>{{ $item["sub"] }}</h5>
        <img src="img/{{ $item["image"] }}" alt="">
    @endforeach
@endsection
