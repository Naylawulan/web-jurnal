<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::latest()->paginate(5);

        //render view with posts
        return view('guru.index', compact('guru'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'     => 'required|min:5',
            'no_hp'     => 'required|min:5',
            'foto'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        //upload image
        $foto = $request->file('foto');
        $foto->storeAs('public/guru', $foto->hashName());

        //create post
        guru::create([
            'nama'     => $request->nama,
            'no_hp'     => $request->no_hp,
            'foto'     => $foto->hashName(),

        ]);

        //redirect to index
        return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
    public function edit(Guru $guru)
    {
        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        $this->validate($request, [
            'nama'     => 'required|min:5',
            'no_hp'     => 'required|min:5',
            'foto'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        if ($request->hasFile('foto')) {

            //upload new image
            $foto = $request->file('foto');
            $foto->storeAs('public/guru', $foto->hashName());

            //delete old image
            Storage::delete('public/guru/'.$guru->foto);

            //update post with new image
            $guru->update([
                'nama'     => $request->nama,
                'no_hp'     => $request->no_hp,
                'foto'     => $foto->hashName(),
            ]);

        } else {
        $guru->update([
            'nama'     => $request->nama,
            'no_hp'   => $request->no_hp
        ]);
    }

    //redirect to index
    return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Diubah!']);
}



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        //delete image
        Storage::delete('public/guru/'. $guru->foto);

        //delete post
        $guru->delete();

        //redirect to index
        return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

