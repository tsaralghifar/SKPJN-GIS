<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Anggarankeluar;
use App\Http\Requests\AnggaranKeluarRequest;

class AnggaranKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keluar = Anggarankeluar::all();
        return view('pages.anggaran.keluar.index')->with([
            'keluar' => $keluar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.anggaran.keluar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnggaranKeluarRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->jumlah_keluar);

        Anggarankeluar::create($data);
        return redirect()->route('keluar');
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
        $keluar =  Anggarankeluar::findOrFail($id);
        return view('pages.anggaran.keluar.edit')->with([
            'keluar' => $keluar
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnggaranKeluarRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->jumlah_keluar);

        $keluar = Anggarankeluar::findOrFail($id);
        $keluar->update($data);

        return redirect()->route('keluar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keluar = Anggarankeluar::findOrFail($id);
        $keluar->delete();

        return redirect()->route('keluar');
    }
}
