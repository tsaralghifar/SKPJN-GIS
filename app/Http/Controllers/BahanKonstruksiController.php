<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Bahankonstruksi;
use App\Http\Requests\BahanKonstruksiRequest;

class BahanKonstruksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahan = Bahankonstruksi::all();
        return view('pages.bahan.index')->with([
            'bahan' => $bahan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.bahan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BahanKonstruksiRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->material);

        Bahankonstruksi::create($data);
        return redirect()->route('bahan');
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
        $bahan =  Bahankonstruksi::findOrFail($id);
        return view('pages.bahan.edit')->with([
            'bahan' => $bahan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BahanKonstruksiRequest $request, $id)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->material);

        $bahan = Bahankonstruksi::findOrFail($id);
        $bahan->update($data);

        return redirect()->route('bahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bahan = Bahankonstruksi::findOrFail($id);
        $bahan->delete();

        return redirect()->route('bahan');
    }
}
