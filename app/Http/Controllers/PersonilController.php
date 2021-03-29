<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Personil;
use App\Models\SiteProyek;
use App\Http\Requests\PersonilRequest;
use Barryvdh\DomPDF\Facade as PDF;

class PersonilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personil = Personil::all();
        return view('pages.personil.index')->with([
            'personil' => $personil
        ]);
    }

    public function createPDF()
    {
        $personil = Personil::all();
        view()->share('personil',$personil);

        $pdf = PDF::loadView('pages.personil.print', $personil);
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

        return view('pages.personil.create', compact('site'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonilRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->personel);

        Personil::create($data);
        return redirect()->route('personil');

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
        $personil =  Personil::findOrFail($id);
        $site = SiteProyek::all();
        return view('pages.personil.edit', compact('personil', 'site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonilRequest $request, $id)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->personel);

        $personil = Personil::findOrFail($id);
        $personil->update($data);

        return redirect()->route('personil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personil = Personil::findOrFail($id);
        $personil->delete();

        return redirect()->route('personil');
    }
}
