@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
</div>
<div class="col-lg-8">
    {{-- akan mengirim data ke controller DahsboardMainController dan akan mengambil method store  --}}
    {{-- jika methodnya put akan ke method update --}}
    {{-- jika method nya delete akan ke method destroy  --}}
    <form  method="POST" action="/dashboard/posts/{{ $post->slug }}" class="mb-5" enctype="multipart/form-data" >
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="tittle" class="form-label" >tittle</label>
          <input type="text" class="form-control @error('tittle') is-invalid @enderror" id="tittle" name="tittle" value="{{ old('tittle',$post->tittle)}}" >
          @error('tittle')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"value="{{ old('slug',$post->slug) }}">
            @error('slug')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <select name="category_id" class="form-select">
              @foreach ($categories as $category)
              <option value="{{ $category->id }} "{{ old('category_id',$post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
              @endforeach
            </select>
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Post Image</label>
          <input type="hidden" value="{{ $post->image }}" name="oldImage">
          {{-- cek jika ada image didalam db --}}
          @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
          @else
            <img class="img-preview img-fluid mb-3 col-sm-5 ">
          @endif
          {{-- membuat previewImage --}}
          <input class="form-control @error('image') is-invalid  @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          @error('body')
              <p class="text-danger">{{ $message }}</p>
          @enderror
          <input id="body" type="hidden" name="body" value="{{ old('body',$post->body) }}" >
          <trix-editor input="body"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
      </form>
</div>
<script>
    const tittle = document.querySelector('#tittle');
    const slug = document.querySelector('#slug');

    // cek event handler 
    // menggunakan event change agar ketika pindah tab bisa langusng berubah 
    tittle.addEventListener('change',function (){
        // fetch 
        // feth memiliki 2 parameter 
        // kirimkan tittle 
        // inputnya tittle 
        // outputnya slug
        fetch('/dashboard/posts/checkSlug?tittle=' + tittle.value)
          // ambil isi nanti response nya akan dijalankan ke method json 
          // json masih berbentuk promise
          .then(response => response.json())
          // kembalikan dalm bentuk data
          // data itu akan mengganti slug
          // slug merupakan inputnya 
          // .value merupakan isinya 
          // dan value nya akan mengmbil data dengan propertynya slug  
          .then(data => slug.value = data.slug)
    });

    // menonaktifkan fitur tambah file di trix editor 
    document.addEventListener('trix-file-accept',function (e) {
      e.preventDefault();
    });

    function previewImage() {
    const image = document.querySelector("#image");
    const imgPreview = document.querySelector(".img-preview");

    // preview image style
    imgPreview.style.display = "block";

    // read data image
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    // load
    oFReader.onload = function (oFREvent) {
        // ambil data dari src
        imgPreview.src = oFREvent.target.result;
    };
}

</script>

@endsection