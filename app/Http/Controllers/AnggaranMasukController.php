<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Anggaranmasuk;
use App\Http\Requests\AnggaranMasukRequest;

class AnggaranMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masuk = Anggaranmasuk::all();
        return view('pages.anggaran.masuk.index')->with([
            'masuk' => $masuk
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.anggaran.masuk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnggaranMasukRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->jumlah_masuk);

        Anggaranmasuk::create($data);
        return redirect()->route('anggaran-masuk');
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
        $masuk =  Anggaranmasuk::findOrFail($id);
        return view('pages.anggaran.masuk.edit')->with([
            'masuk' => $masuk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnggaranMasukRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->jumlah_masuk);

        $masuk = Anggaranmasuk::findOrFail($id);
        $masuk->update($data);

        return redirect()->route('anggaran-masuk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $masuk = Anggaranmasuk::findOrFail($id);
        $masuk->delete();

        return redirect()->route('anggaran-masuk');
    }
}
