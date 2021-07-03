<?php

namespace App\Http\Controllers\Api;

use App\Ulasan;
use App\Wisata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       $ulasan = Ulasan::all();
        return response()->json($ulasan);

    }

    public function getUlasan($id){
        $ulasan = Ulasan::where('wisata_id', $id)->get();
        return response()->json($ulasan);
    }

    public function store(Request $request)
    {
        $request->validate([
            'wisata_id' => 'required',
            'nama_penulis' => 'required',
            'ulasan' => 'required',
            'nilai' => 'required',
        ]);

        ulasan::create($request->all());
        $ulasan = $request;
        $ulasan['message'] = 'Sukses tambah komentar';
        return response()->json($ulasan);

    }
}
