{{-- dump and die --}}
{{-- @dd($posts); --}}

{{-- menggunakan layout dari main --}}
@extends('layouts.main')

{{-- menggunakan element --}}
@section('container')
{{-- <h1>Post Category : {{ $category }}</h1> --}}
<h1 class="mb-3 text-center">{{ $tittle }}</h1>

    <div class="row justify-content-center mb-3 ">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}"  >
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}" >
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}"  >
                    <button class="btn btn-danger" type="submit" >Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
    <div class="card mb-3">
        @if ($posts[0]->image)
            <div  style="max-height: 350px; overflow:hidden; margin:auto "  >
                <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid" >
            </div>
        @else
        <img src="https://source.unsplash.com/1200x400/?{{ $posts[0]->category->name }}" rel="first" class="card-img-top" alt="{{ $posts[0]->category->name }}">
        @endif
        <div class="card-body text-center  ">
          <h5 class="card-title"><a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none text-dark" >{{ $posts[0]->tittle }}</a></h5>
            <p>
                <small class="text-muted">
                    <a href="/posts?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> in  <a href="/posts?category={{ $posts[0]->category->slug }}"class="text-decoration-none"   >{{ $posts[0]->category->name }}</a>
                    {{ $posts[0]->created_at->diffForHumans() }}
                </small>
            </p>
          <p class="card-text">{{  Str::remove('&nbsp;',strip_tags($posts[0]->excerpt)) }}</p>
          <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary"   >Read More .....</a>
        </div>
      </div>
    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
            <div class="col-md-4 mb-3   ">
                <div class="card">
                    <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)" ><a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid" >
                    @else
                    <img src="https://source.unsplash.com/500x500/?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                    @endif
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->tittle }}</h5>
                      <p>
                        <small class="text-muted">
                            <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                            {{ $post->created_at->diffForHumans() }}
                        </small>
                    </p>
                      <p class="card-text">{{ Str::remove('&nbsp;',$post->excerpt) }}</p>
                      <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
       
    </div>
    @else
        <p class="text-center fs-4  " >No Post Found</p>
    @endif
    {{-- @foreach ($posts->skip(1) as $post)
        <article class="mb-5 border-bottom pb-4   "   >
            <h2>
                <a href="/post/{{ $post->slug }}" class="text-decoration-none"  >{{ $post->tittle }}</a>
            </h2>
            <p><a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in  <a href="/categories/{{ $post->category->slug }}"class="text-decoration-none"   >{{ $post->category->name }}</a></p>
            <p>{{ $post->excerpt }}</p>
            <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none"  >Read More....</a></p>
        </article>
    @endforeach --}}
    <div class="d-flex justify-content-center"   >
        {{ $posts->links() }}
    </div>
@endsection
