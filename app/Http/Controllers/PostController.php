<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        return view('post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $path = Storage::disk('public')->putFile('post', $request->file('photo'),);
        }else{
            $path = null;
        }

        $slug = Str::slug($request->judul, '-');
        $post =[
            'user_id' => Auth::user()->id,
            'title' => $request->judul,
            'slug' => $slug,
            'body' => $request->isi,
            'path' => $path,
        ];

        Post::create($post);

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data = Post::where('slug', $slug)->get();
        // dd($data);
        return view('post.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        if ($request->hasFile('photo')) {
            Storage::delete('public/'.$post->path);
            $path = Storage::disk('public')->putFile('post', $request->file('photo'),);
        }else{
            $path = $post->path;
        }

        $slug = Str::slug($request->judul, '-');
        $post1 =[
            'user_id' => Auth::user()->id,
            'title' => $request->judul,
            'slug' => $slug,
            'body' => $request->isi,
            'path' => $path,
        ];

        $post->update($post1);

        return redirect()->route('post.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Post::findOrFail($id);
        Storage::delete('public/'.$delete->path);
        $delete->delete();

        return redirect()->route('post.index')->with('success', 'Data berhasil dihapus!');
    }
}
