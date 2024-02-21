<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\mapel;
use App\Models\pengajar;
use Illuminate\Http\Request;

class PengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajar = pengajar::all();
        return view('pengajar.index',compact('pengajar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = guru::all();
        $item = mapel::all();
        return view('pengajar.create', compact('data','item'));
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
            'guru_id'   => 'required',
            'mapel_id'   => 'required',
            'kelas'   => 'required',
            'jam_pelajaran'   => 'required',

        ]);
        pengajar::create([
            'guru_id'     => $request->guru_id,
            'mapel_id'     => $request->mapel_id,
            'kelas'   => $request->kelas,
            'jam_pelajaran'   => $request->jam_pelajaran,

        ]);

        //redirect to index
        return redirect()->route('pengajar.index')->with(['success' => 'Data Berhasil Disimpan!']);

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
    public function edit(pengajar $pengajar)
    {
        $data = guru::all();
        $item = mapel::all();
        return view('pengajar.edit', compact('data','item','pengajar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pengajar $pengajar)
    {
        $this->validate($request, [
            'guru_id'   => 'required',
            'mapel_id'   => 'required',
            'kelas'   => 'required',
            'jam_pelajaran'   => 'required',

        ]);
        $pengajar->update([
            'guru_id'     => $request->guru_id,
            'mapel_id'     => $request->mapel_id,
            'kelas'   => $request->kelas,
            'jam_pelajaran'   => $request->jam_pelajaran,

        ]);

        //redirect to index
        return redirect()->route('pengajar.index')->with(['success' => 'Data Berhasil Disimpan!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( pengajar $pengajar)
    {
           //delete post
           $pengajar->delete();

           //redirect to index
           return redirect()->route('pengajar.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
