<?php

namespace App\Http\Controllers\Api;

use App\Wisata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $wisata = Wisata::all();
        return response()->json([
            'Search' => $wisata
        ]
    );
        //$datadesa = Datadesa::all();
        //return response()->json($datadesa);
    }

    public function getKategori($id){
        $wisata = Wisata::where('kategori', $id)->get();
        return response()->json($wisata);
    }
}

