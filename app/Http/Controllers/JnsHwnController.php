<?php

namespace App\Http\Controllers;

use App\Models\jns_hwn;
use Illuminate\Http\Request;

class JnsHwnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.jns_hwn.index',[
            'jns_hwns'=>jns_hwn::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.jns_hwn.create",[
            
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
            'nama_jns' =>'required'
        ]);
  
       jns_hwn::create($validatedDate);
       return redirect('/jns_hwn');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jns_hwn  $jns_hwn
     * @return \Illuminate\Http\Response
     */
    public function show(jns_hwn $jns_hwn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jns_hwn  $jns_hwn
     * @return \Illuminate\Http\Response
     */
    public function edit(jns_hwn $jns_hwn)
    {
        return view('dashboard.jns_hwn.edit',[
            'jns_hwns'=>$jns_hwn
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jns_hwn  $jns_hwn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jns_hwn $jns_hwn)
    {
        $validatedDate=$request->validate([
            'nama_jns' =>'required'
        ]);
  
       jns_hwn::where('id',$jns_hwn->id)->update($validatedDate);
       return redirect('/jns_hwn');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jns_hwn  $jns_hwn
     * @return \Illuminate\Http\Response
     */
    public function destroy(jns_hwn $jns_hwn)
    {
        jns_hwn::destroy($jns_hwn->id);
        return redirect('/jns_hwn')->with('pesan','Data berhasil dihapus');
    }
}
