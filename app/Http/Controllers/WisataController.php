<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Photos;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        return view('wisata.info.create', compact('category'));
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

            foreach ($request->file('pp') as $file) {
                $path = Storage::disk('public')->putFile('pp', $file);
                $photos = [
                    'wisata_id' => $wisata->id,
                    'path' => $path,
                ];
                Photos::create($photos);
            }
      // Photo::create($photos);

      return redirect()->route('wisata.index')->with('status', 'Space created!');
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
        $data = Wisata::findOrFail($id);

        if ($request->hasFile('pp')) {
            foreach ($data->photos as $key) {
                Storage::delete('public/'.$key->path);
            }
            $gambar = $data->photos()->delete();
            foreach ($request->file('pp') as $file) {
                $path = Storage::disk('public')->putFile('pp', $file);
                $photos = [
                    'wisata_id' => $id,
                    'path' => $path,
                ];
                Photos::create($photos);
            }
        }

        $wisata = [
            'category_id' => $request->category_id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ];

        $data->update($wisata);

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
        foreach ($wisata->photos as $key) {
            Storage::delete('public/'.$key->path);
        }

        return redirect()->route('wisata.index')->with('success', 'Data berhasil dihapus!');
    }
}
