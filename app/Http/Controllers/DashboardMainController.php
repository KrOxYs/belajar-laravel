<?php

namespace App\Http\Controllers;

use App\Models\main;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class DashboardMainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index',[
            'posts' => main::all()->where('user_id', auth()->user()->id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.posts.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate data
        $validateData = $request->validate([
            'tittle' => 'required|max:255',
            'body' => 'required',
            'slug' => 'required|unique:mains',
            'image' => 'image|file|max:1024',
            'category_id' => 'required'
        ]);

        // cek jika file ada 
        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        // validate user_id dan excerpt 
        $validateData['user_id'] = auth()->user()->id;
        // menggunakan strip_tags untuk menghilangkan tag html 
        $validateData['excerpt'] = Str::limit(strip_tags($request->body),200);

        main::create($validateData);
        return redirect('/dashboard/posts')->with('success','New Post Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\main  $main
     * @return \Illuminate\Http\Response
     */
    public function show(main $post)
    {
        if($post->author->id !== auth()->user()->id){
            abort(403);
        }
        return view('dashboard.posts.show',[
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\main  $main
     * @return \Illuminate\Http\Response
     */
    public function edit(main $post)
    {
        if($post->author->id !== auth()->user()->id){
            abort(403);
        }
        return view('dashboard.posts.edit',[
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\main  $main
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, main $post)
    {
        $rules = [
            'tittle' => 'required|max:255',
            'body' => 'required',
            'image' => 'image|file|max:1024',
            'category_id' => 'required'
        ];

        // cek jika slug tidak sama dengan yang diketik dengan yang ada d dalam database 
        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:mains';
        }

        $validateData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body),200);

        main::where('id',$post->id)->update($validateData);
        
        return redirect('/dashboard/posts')->with('success','Post Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\main  $main
     * @return \Illuminate\Http\Response
     */
    public function destroy(main $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }
        main::destroy($post->id);
        return redirect('/dashboard/posts')->with('success',' Post Has Been Deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(main::class, 'slug', $request->tittle);
        // return sebagai response dalam bentuk json yang isisnya birisi isinya slug yang berisi slug 
        return response()->json(['slug' => $slug]);
    }
}
