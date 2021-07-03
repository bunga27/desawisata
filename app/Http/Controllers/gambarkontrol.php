<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gambar;
use Ramsey\Uuid\Uuid;

class gambarkontrol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gambar = Gambar::all();
        return view('galeri', compact('gambar'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('gambar2')) {
            $files = $request->file('gambar2');
            foreach ($files as $file) {
                $extension = $file->extension();
                $filename = Uuid::uuid4() . ".{$extension}";
                $file->move(base_path('public/storage/wisata'), $filename);
                $datas['gambar2'] = asset("/storage/wisata/{$filename}");
                // $datas['gambar2'] = substr($file, 0);

                $gambar = new Gambar([
                    'wisata_id' => $request->wisata_id,
                    'gambar2' => $datas['gambar2']
                ]);
                $gambar->save();
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function back()
    {
        return redirect('/wisata')->with('status', 'Galeri Diperbarui!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Gambar::destroy($id);
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
