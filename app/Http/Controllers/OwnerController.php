<?php

namespace App\Http\Controllers;

use App\Models\owner;
use Illuminate\Http\Request;
use App\Models\hewan;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.owner.index',[
            'owners'=>owner::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.owner.create",[
            'owners'=>owner::all()
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
            'nama_owner' =>'required',
            'no_telp' => 'required',
            'email' => 'required',
            'alamat' => 'required'
        ]);
  
       owner::create($validatedDate);
       return redirect('/owner');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(owner $owner)
    {
        return view('dashboard.owner.edit',[
            'owner'=>$owner
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, owner $owner)
    {
        $validatedDate=$request->validate([
            'nama_owner' =>'required',
            'no_telp' => 'required',
            'email' => 'required',
            'alamat' => 'required'
        ]);
  
       owner::where('id',$owner->id)->update($validatedDate);
       return redirect('/owner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(owner $owner)
    {
        owner::destroy($owner->id);
        return redirect('/owner')->with('pesan','Data berhasil dihapus');
    }
}
