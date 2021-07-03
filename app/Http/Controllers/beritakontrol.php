<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class beritakontrol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = berita::all();
        return view('readberita', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createberita');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->except(['gambar']);

        $extension = $request->gambar->extension();
        $filename = Uuid::uuid4() . ".{$extension}";
        // $request->gambar->storeAs('public/berita', $filename);
        $request->gambar->move(base_path('public/storage/berita'), $filename);
        $gambar = asset("/storage/berita/{$filename}");
        $data['gambar'] = substr($gambar, 22);
        // print_r($data);
        $data['nama_penulis'] = auth()->user()->name;
        Berita::create($data);
        return redirect('/berita')->with('status', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id_berita)
    {
        $berita = Berita::find($id_berita);
        return view('editberita', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, berita $berita)
    {

        $data = $request->except(['gambar']);

        if ($request->hasFile('gambar')) {
            $extension = $request->gambar->extension();
            $filename = Uuid::uuid4() . ".{$extension}";
            $oldfile = basename($berita->gambar);
            Storage::delete("berita/{$oldfile}");
            $request->gambar->move(base_path('public/storage/berita'), $filename);
            $data['gambar'] = asset("/storage/berita/{$filename}");
        }

        $berita->fill($data);
        $berita->save();

        return redirect('/berita')->with('status', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(berita $berita)
    {
        // dd($berita);
        berita::destroy($berita->id_berita);
        return redirect('/berita')->with('status', 'Data Berhasil dihapus');
    }
}
