<?php

namespace App\Http\Controllers;

use App\Wisata;
use App\Gambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class wisatakontrol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wisata = wisata::all();
        return view('readwisata', compact('wisata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $kecamatan = Kecamatan::all();
        // $desa = Desa::all();
        return view('createwisata');
    }

    // public function getDesa(Request $request){
    //     $desa = Desa::where('kecamatan_id',$request->kecID)->pluck('id_desa','nama_desa');
    //     return response()->json($desa);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $wisata = new Wisata ([
            'kategori'=> $request->kategori,
            'nama_wisata'=> $request->nama_wisata,
            'deskripsi'=>$request->deskripsi,
            'alamat'=>$request->alamat,
            'maps'=>$request->maps,
            'koordinat'=>$request->lat.','.$request->lng,
            'youtube_profil'=>$request->youtube_profil,
            'jam_buka'=>$request->jam_buka,
            'jam_tutup'=>$request->jam_tutup,
        ]);
        $wisata->save();


          if($request->hasFile('gambar2')){
             $files=$request->file('gambar2');
             foreach($files as $file){

                $extension = $file->extension();
                $filename = Uuid::uuid4() . ".{$extension}";
                $file->move(base_path('public/storage/wisata'), $filename);
                $datas['gambar2'] = asset("/storage/wisata/{$filename}");
                // $datas['gambar2'] = substr($file, 0);

                $gambar = new Gambar([
                    'wisata_id' => $wisata->id_wisata,
                    'gambar2' => $datas['gambar2']
                ]);
                $gambar->save();
             }
        }

        return redirect('/wisata')->with(['success' => 'Data Wisata Berhasil Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function show(wisata $wisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wisata = Wisata::find($id);
        $gambar = Gambar::where('wisata_id', $id)->get();
        return view('editwisata', compact('wisata','gambar'));
    }

    public function galeri($id)
    {
        $wisata = Wisata::find($id);
        $gambar = Gambar::where('wisata_id', $id)->get();
        return view('galeri', compact('wisata', 'gambar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wisata $wisata)
    {

        $data = $request->all();
        $wisata->fill($data);
        $wisata->save();

        return redirect('/wisata')->with('status', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($wisata);
        wisata::destroy($id);
        return redirect('/wisata')->with('status', 'Data Berhasil dihapus');
    }

    // public function kecamatan()
    //   {
    //     $kecamtan = Kecamatan::orderBy("id_kecamamatan")
    //                     ->pluck("name","id");
    //     return view('createwisata',compact('kecamatan'));
    //   }

    // public function desa($id)
    //     {
    //         $desa = Desa::where("id_desa","=",$id)
    //                     ->pluck("nama_desa","id");
    //         return json_encode($city);
    //     }

}
