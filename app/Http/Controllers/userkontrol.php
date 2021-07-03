<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class userkontrol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('readuser', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('createuser', compact('users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'level' => $request->level,
            'password' => Hash::make($request->password)
        ]);
        return redirect('/dataadmin')->with(['success' => 'Data Admin Berhasil Ditambahkan!']);
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
        $users = User::find($id);
        return view('edituser', compact('users'));
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
        if(!empty($request->password)){
            User::where('id', $id)->update([
                'email' => $request->email,
                'name' => $request->name,
                'level' => $request->level,
                'password' => Hash::make($request->password)
            ]);
        } else {
            User::where('id', $id)->update([
                'email' => $request->email,
                'name' => $request->name,
                'level' => $request->level
            ]);
        }

        return redirect('/dataadmin')->with(['success' => 'Data Admin Berhasil Diperbarui!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        User::destroy($id);
        return redirect('/dataadmin')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
