<?php

namespace App\Http\Controllers\Api;

use App\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $berita = Berita::all();
        return response()->json([
            'BeritaData' => $berita,
            'message' => 'Sukses ambil data',
        ]);
    }
}

