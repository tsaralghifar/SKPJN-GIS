<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Sewaalat;
use App\Http\Requests\SewaAlatRequest;

class SewaAlatContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sewa = Sewaalat::all();
        return view('pages.sewa-alat.index')->with([
            'sewa' => $sewa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.sewa-alat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SewaAlatRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->jenis_alat);

        Sewaalat::create($data);
        return redirect()->route('sewa-alat');
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
        $sewa =  Sewaalat::findOrFail($id);
        return view('pages.sewa-alat.edit')->with([
            'sewa' => $sewa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SewaAlatRequest $request, $id)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->jenis_alat);

        $sewa = Sewaalat::findOrFail($id);
        $sewa->update($data);

        return redirect()->route('sewa-alat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sewa = Sewaalat::findOrFail($id);
        $sewa->delete();

        return redirect()->route('sewa-alat');
    }
}
