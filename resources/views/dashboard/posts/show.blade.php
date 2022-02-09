@extends('dashboard.layouts.main')

@section('container')

    <div class="container">
        <div class="row  justify-content-center  mb-5 ">
            <div class="col-md-8">
                <h1 class="mb-3" >{{ $post->tittle }}</h1>
                <a href="/dashboard/posts" class="btn btn-success"  ><span data-feather="arrow-left"></span> Back to all my post </a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"  ><span data-feather="edit"></span>Edit</a>
                {{-- <a href="" class="btn btn-danger"  ><span data-feather="x-circle"></span>Delete</a> --}}
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are u Sure')" ><span data-feather="x-circle"></span>Delete</button>
                </form>
                <p><a href="#">{{ $post->author->name }}</a> <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
                @if ($post->image)
                <div  style="max-height: 350px; overflow:hidden "  >
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid" >
                </div>
                @else
                <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid" >
                @endif
                 <article class="my-3 fs-5" >
                    {!!  $post->body !!}
                 </article>
            </div>
        </div>
    </div>
@endsection