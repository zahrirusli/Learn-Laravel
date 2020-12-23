<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\mhs;
use App\dosen;

class MhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = DB::table('mhs')->join('dosens','mhs.nipdosenwali','=','dosens.nip')->get();
        return view ('mhs.index',compact('mhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dsn = dosen::pluck('namadosen','nip');
        return view ('mhs.create',compact('dsn'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        mhs::create($request->all());        
        return redirect('/mhs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mhs  $mhs
     * @return \Illuminate\Http\Response
     */
    public function show(mhs $mhs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mhs  $mhs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mhsnya    = mhs::findorfail($id);
        $dosennya  = dosen::pluck('namadosen','nip');
        return view('mhs.edit',compact('mhsnya','dosennya'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mhs  $mhs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$mhsnya = mhs::findorfail($id);
    	$mhsnya->update($request->all());
    	return redirect('/mhs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mhs  $mhs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $mhsnya = mhs::findorfail($id);
        $mhsnya->delete();
        return redirect('/mhs');
    }
}
