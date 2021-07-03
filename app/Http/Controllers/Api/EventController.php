<?php

namespace App\Http\Controllers\Api;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $event = Event::all();
        return response()->json([
            'data' => $event,
            'message' => 'Sukses ambil data',
        ]);
    }

    public function getKategori($id){
        $event = Event::where('kategori', $id)->get();
        return response()->json($event);
    }
}

