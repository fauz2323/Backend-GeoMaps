<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Category;
use Illuminate\Http\Request;

class WisataController extends Controller
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
        $wisata = Wisata::with('categories')->get();
        return view('wisata.info.index', compact('wisata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $coord = Wisata::all();
        return view('wisata.info.create', compact('category', 'coord'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wisata = Wisata::create([
            'category_id' => $request->category_id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect('/wisata');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = \App\Models\Wisata::find($id);
        $category = \App\Models\Category::all();

        return view('wisata.info.edit', compact('category', 'data'));
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
        $data = \App\Models\Wisata::find($id);

        $data->update($request->all());

        return redirect()->route('wisata.index')->with('success', 'Data berhasil terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wisata = Wisata::destroy($id);
        return redirect()->route('wisata.index')->with('success', 'Data berhasil dihapus!');
    }
}
