<?php

namespace App\Http\Controllers;

use App\Ulasan;
use App\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class ulasankontrol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ulasan = ulasan::all();
        $wisata = wisata::all();
        return view('/readulasan', compact('ulasan','wisata'));
    }


    public function destroy(ulasan $ulasan)
    {
        ulasan::destroy($ulasan->id_ulasan);
        return redirect('/ulasan')->with('status', 'Data Berhasil dihapus');
    }
}
