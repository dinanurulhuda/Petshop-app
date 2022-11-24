<?php

namespace App\Http\Controllers;

use App\Models\Penitipan;
use App\Models\owner;
use App\Models\hewan;
use Illuminate\Http\Request;

class PenitipanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.penitipan.index',[
            'penitipans'=>Penitipan::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.penitipan.create",[
            'penitipans'=>Penitipan::all(),
            'owners'=>owner::all(),
            'hewans'=>hewan::all()
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedDate=$request->validate([
            'hewan_id' =>'required',
            'owner_id' => 'required',
            'tgl_nitip' => 'required',
            'tgl_keluar' => 'required'
        ]);
  
       Penitipan::create($validatedDate);
       return redirect('/penitipan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penitipan  $penitipan
     * @return \Illuminate\Http\Response
     */
    public function show(Penitipan $penitipan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penitipan  $penitipan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penitipan $penitipan)
    {
        return view('dashboard.penitipan.edit',[
            'penitipan'=>$penitipan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penitipan  $penitipan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penitipan $penitipan)
    {
        $validatedDate=$request->validate([
            'hewan_id' =>'required',
            'owner_id' => 'required',
            'tgl_nitip' => 'required',
            'tgl_keluar' => 'required'
        ]);
  
       Penitipan::where('id',$penitipan->id)->update($validatedDate);
       return redirect('/penitipan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penitipan  $penitipan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penitipan $penitipan)
    {
        Penitipan::destroy($penitipan->id);
        return redirect('/penitipan')->with('pesan','Data berhasil dihapus');
    }
}
