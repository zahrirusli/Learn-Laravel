<?php

namespace App\Http\Controllers;

use App\dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dsn = dosen::paginate(10);
        return view('dosen.index',compact('dsn'));
    }
    
    public function bootGrid()
    {
    	$dsn = dosen::all();
    	return view ('dosen.bootGird',compact('dsn'));
    }
    
    public function listMhsWali($id)
    {
    	$dsn = dosen::where('nip',$id)->firstOrFail();
    	return view ('dosen.listMhsWali',compact('dsn'));
    }
    
    public function search(Request $r)
    {
    	$cari = $r->get('search');
    	$dsn = dosen::where('namadosen','LIKE', '%'.$cari . '%')->paginate(100);
    	return view ('dosen.index',compact('dsn'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       dosen::create($request->all());
       return redirect('/dosen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(dosen $dosen)
    {
       $dsn = dosen::findorfail($dosen);
       return view ('dosen.edit',compact('dsn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dosen $dosen)
    {
        $dsn = dosen::findorfail($dosen);
        $dsn->update($request->all());
        return redirect('/dosen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(dosen $dosen)
    {
        $dsn = dosen::findorfail($dosen);
        $dsn->delete();
        return redirect('/dosen');
    }
    
    public function del(Request $data)
    {
    	Dosen::where('nip',$data['del_id'])->delete();
     	return redirect('/viewdosen');
    }
    public function save(Request $data)
    {
    	$edit = Dosen::where('nip',$data['edit_id'])->first();
    	$edit->nip 			= $data['nip'];
    	$edit->namadosen 	= $data['namadosen'];
    	$edit->save();
    	return redirect('/viewdosen');
    }
}
