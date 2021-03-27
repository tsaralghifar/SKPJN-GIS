<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use App\Http\Requests\PekerjaanRequest;
use App\Models\SiteProyek;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pekerjaan = Pekerjaan::all();
        return view('pages.pekerjaan.index')->with([
            'pekerjaan' => $pekerjaan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $site = SiteProyek::all();
        return view('pages.pekerjaan.create', compact('site'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PekerjaanRequest $request)
    {
        $data = $request->validated();

        Pekerjaan::create($data);
        return redirect()->route('pekerjaan');
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
        $site = SiteProyek::all();
        $pekerjaan =  Pekerjaan::findOrFail($id);
        
        return view('pages.pekerjaan.edit', compact('pekerjaan', 'site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PekerjaanRequest $request, $id)
    {
        $data = $request->all();

        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->update($data);

        return redirect()->route('pekerjaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->delete();

        return redirect()->route('pekerjaan');
    }
}
