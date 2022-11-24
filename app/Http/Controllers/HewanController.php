<?php

namespace App\Http\Controllers;

use App\Models\hewan;
use Illuminate\Http\Request;
use App\Models\owner;
use App\Models\jns_hwn;

class HewanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.hewan.index',[
            'hewans'=>hewan::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.hewan.create",[
            'owners'=>owner::all(),
            'jenis'=>jns_hwn::all()
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
            'nama_hewan' =>'required',
            'jns_hewan_id' => 'required',
            'owner_id' => 'required',
            'tanggal_masuk' => 'required',
            'alamat' => 'required'
        ]);
  
       hewan::create($validatedDate);
       return redirect('/hewan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hewan  $hewan
     * @return \Illuminate\Http\Response
     */
    public function show(hewan $hewan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hewan  $hewan
     * @return \Illuminate\Http\Response
     */
    public function edit(hewan $hewan)
    {
        return view('dashboard.hewan.edit',[
            'owners'=>owner::all(),
            'hewans'=>$hewan,
            'jenis'=>jns_hwn::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hewan  $hewan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hewan $hewan)
    {
        $validateDate=$request->validate([
            'nama_hewan' => 'required',
            'jns_hewan_id' => 'required',
            'owner_id' => 'required',
            'tanggal_masuk' => 'required',
            'alamat' => 'required'
        ]);
        
        hewan::where('id',$hewan->id)->update($validateDate);
        return redirect('/hewan')->with('pesan','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hewan  $hewan
     * @return \Illuminate\Http\Response
     */
    public function destroy(hewan $hewan)
    {
        hewan::destroy($hewan->id);
        return redirect('/hewan')->with('pesan','Data berhasil dihapus');
    }
}
