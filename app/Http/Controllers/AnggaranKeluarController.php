<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Anggarankeluar;
use App\Http\Requests\AnggaranKeluarRequest;
use App\Models\SiteProyek;

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
        $site = SiteProyek::all();
        
        return view('pages.anggaran.keluar.index', compact('keluar', 'site'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $site = SiteProyek::all();
        return view('pages.anggaran.keluar.create', compact('site'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnggaranKeluarRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->jumlah_keluar);

        Anggarankeluar::create($data);
        return redirect()->route('anggaran-keluar');
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
        $site = SiteProyek::all();

        return view('pages.anggaran.keluar.edit', compact('site', 'keluar'));
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
        $data = $request->validated();
        $data['slug'] = Str::slug($request->jumlah_keluar);

        $keluar = Anggarankeluar::findOrFail($id);
        $keluar->update($data);

        return redirect()->route('anggaran-keluar');
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

        return redirect()->route('anggaran-keluar');
    }
}
