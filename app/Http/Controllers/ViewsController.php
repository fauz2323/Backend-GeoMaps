<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ViewsController extends Controller
{
    public function index($slug)
    {
        $data = Post::where('slug', $slug)->first();
        // dd($data);
        return view('view.index', compact('data'));
    }
}
