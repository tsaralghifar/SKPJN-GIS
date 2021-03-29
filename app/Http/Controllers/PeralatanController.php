<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Peralatan;
use App\Http\Requests\PeralatanRequest;
use App\Models\SiteProyek;
use Barryvdh\DomPDF\Facade as PDF;

class PeralatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peralatan = Peralatan::all();
        return view('pages.peralatan.index')->with([
            'peralatan' => $peralatan
        ]);
    }

    public function createPDF()
    {
        $peralatan = Peralatan::all();
        view()->share('peralatan',$peralatan);

        $pdf = PDF::loadView('pages.peralatan.print', $peralatan);
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $site = SiteProyek::all();
        return view('pages.peralatan.create', compact('site'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeralatanRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->alat);

        Peralatan::create($data);
        return redirect()->route('peralatan');
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
        $peralatan =  Peralatan::findOrFail($id);
        
        return view('pages.peralatan.edit', compact('peralatan', 'site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PeralatanRequest $request, $id)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->alat);

        $peralatan = Peralatan::findOrFail($id);
        $peralatan->update($data);

        return redirect()->route('peralatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peralatan = Peralatan::findOrFail($id);
        $peralatan->delete();

        return redirect()->route('peralatan');
    }
}
