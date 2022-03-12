<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Wisata;

class ApiController extends Controller
{
    public function categoryList()
    {
        $cat = Category::all();

        return response()->json([
            'category' => $cat
        ], 200);
    }

    public function wisataList()
    {
        $wisata = Wisata::all();

        return response()->json([
            'wisata' => $wisata,
        ], 200);
    }

    public function wisataCategory($cat)
    {
        $wisataCategory = Category::where('categori', $cat)->first();
        $wisata = Wisata::where('category_id', $wisataCategory->id)->with('photos')->get();

        return response()->json([
            'wisata' => $wisata,
        ], 200);
    }

    public function wisataDetail($id)
    {
        $detail = Wisata::findOrFail($id)->with('photos');

        return response()->json([
            'details' => $detail
        ], 200);
    }
}
