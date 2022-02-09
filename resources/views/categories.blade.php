@extends('layouts.main')

{{-- menggunakan element --}}
@section('container')
<h1>Categories</h1>
    <div class="container">
        <div class="row">
            @foreach ($category as $categories)
            <div class="col-md-4">
                <a href="/posts?category={{ $categories->slug }}">
                    <div class="card bg-dark text-white ">
                        <img src="https://source.unsplash.com/500x500/?{{ $categories->name }}"class="card-img" alt="...">
                        <div class="card-img-overlay d-flex align-items-center p-0   ">
                        <h5 class="card-title  text-center flex-fill p-4 fs-3" style="background-color: rgba(0, 0, 0, 0.7)" >{{ $categories->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection