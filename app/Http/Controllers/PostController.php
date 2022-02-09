<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\main;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        // ambil data
        // $posts = main::latest();

        // cek jika ada pencarian 
        // jika ada maka tampilkan apa yang diketik
        // jika tidak ada maka akan menampilkan semua postingan 
        $tittle = '';

        if(request('category')) {
            $category = Category::firstWhere('slug',request('category'));
            $tittle = ' in ' . $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username',request('author'));
            $tittle = ' by ' . $author->name;
        }

        return view('posts',[
            "tittle" => "All Posts" . $tittle,
            "active" => "posts",
            // menggunakan method withQuery apapun yang ada dalam query string sebelumnya bawa semua 
            "posts" =>  main::latest()->Filter(request(["search","category","author"]))->paginate(7)->withQueryString()
        ]);
    }

    public function show ( main $main)
    {
        return view('post',[
            "tittle" => "Single Post",
            "active" => "post",
            "post" => $main
        ]);
    }

    public function produk ()
    {
        return view('produk',[
            "tittle" => "Produk",
            "active" =>'produk',
            "barang" => \App\Models\Post::data()
        ]);
    }

    public function about()
    {
        return view('about',[
            "tittle" => "About",
            "active" => "about",
            "name" => "Rai",
            "old" => 1000 . " years",
            "image" => "meja.jpg"
        ]);
    }


    public function home ()
    {
        return view('home',[
            "tittle" => "Home",
            "active" => "home"
        ]);
    }

    public function categories()
    {
        return view('categories',[
            'tittle' => 'Post Categories',
            "active" => 'categories',
            'category' => Category::all()
        ]);
    }
}
