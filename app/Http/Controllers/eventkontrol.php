<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class eventkontrol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = event::all();
        return view('readevent', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createevent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'namaevent' => 'required',
        //     'deskripsi' => 'required',
        //     'gambar' => 'image:svg,png,jpg'
        // ]);

        $data = $request->except(['gambar']);

        $extension = $request->gambar->extension();
        $filename = Uuid::uuid4() . ".{$extension}";
        // $request->gambar->storeAs('public/event', $filename);
        $request->gambar->move(base_path('public/storage/event'), $filename);
        $data['gambar'] = asset("/storage/event/{$filename}");
        $data['nama_penulis'] = auth()->user()->name;
        Event::create($data);
        // echo ($data);
        return redirect('/event')->with('status', 'Data Berhasil Ditambahkan!');
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
    public function edit(Event $event)
    {
        $event = Event::find($event->id_event);
        return view('editevent', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event $event)
    {


        $data = $request->except(['gambar']);

        if ($request->hasFile('gambar')) {
            $extension = $request->gambar->extension();
            $filename = Uuid::uuid4() . ".{$extension}";
            $oldfile = basename($event->gambar);
            Storage::delete("event/{$oldfile}");
            $request->gambar->move(base_path('public/storage/event'), $filename);
            $data['gambar'] = asset("/storage/event/{$filename}");
        }

        $event->fill($data);
        $event->save();

        return redirect('/event')->with('status', 'Data Berhasil Diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(event $event)
    {
        event::destroy($event->id_event);
        return redirect('/event')->with('status', 'Data Berhasil dihapus');
    }
}
