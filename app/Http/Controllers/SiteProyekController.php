<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteProyekStoreRequest;
use App\Models\SiteProyek;
use Barryvdh\DomPDF\Facade as PDF;

class SiteProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyek = SiteProyek::all();

        return view('pages.site-proyek.index', compact('proyek'));
    }

    public function createPDF()
    {
        $proyek = SiteProyek::all();
        view()->share('proyek',$proyek);

        $pdf = PDF::loadView('pages.site-proyek.print', $proyek);
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.site-proyek.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiteProyekStoreRequest $request)
    {
        SiteProyek::create($request->validated());

        return redirect(route('site'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyek = SiteProyek::findOrFail($id);

        return view('pages.site-proyek.edit', compact('proyek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SiteProyekStoreRequest $request, $id)
    {
        $proyek = SiteProyek::findOrFail($id);
        $proyek->update($request->validated());

        return redirect(route('site'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SiteProyek::findOrFail($id)->delete();
        
        return redirect(route('site'));
    }
}
