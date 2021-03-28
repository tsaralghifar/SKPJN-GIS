<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Penghambat;
use App\Http\Requests\PenghambatRequest;

class PenghambatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penghambat = Penghambat::all();
        return view('pages.penghambat.index')->with([
            'penghambat' => $penghambat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.penghambat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenghambatRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->jenis_kejadian);

        Penghambat::create($data);
        return redirect()->route('penghambat');
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
        $penghambat =  Penghambat::findOrFail($id);
        return view('pages.penghambat.edit')->with([
            'penghambat' => $penghambat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PenghambatRequest $request, $id)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->jenis_kejadian);

        $penghambat = Penghambat::findOrFail($id);
        $penghambat->update($data);

        return redirect()->route('penghambat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penghambat = Penghambat::findOrFail($id);
        $penghambat->delete();

        return redirect()->route('penghambat');
    }
}
