<?php

namespace App\Http\Controllers;

use App\Models\IndikatorKerja;
use App\Models\Posisi;
use Illuminate\Http\Request;

class IndikatorKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posisi = Posisi::all();
        $items = IndikatorKerja::all();
        return view('admin.indikator.index', compact('posisi', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        IndikatorKerja::create($request->except('_token'));
        return redirect()->back()->with('success', 'Indikator berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IndikatorKerja  $indikatorKerja
     * @return \Illuminate\Http\Response
     */
    public function show(IndikatorKerja $indikatorKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IndikatorKerja  $indikatorKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(IndikatorKerja $indikatorKerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IndikatorKerja  $indikatorKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IndikatorKerja $indikator)
    {
        $indikator->update($request->except('_token'));
        return redirect()->back()->with('success', 'Indikator berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IndikatorKerja  $indikatorKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(IndikatorKerja $indikator)
    {
        $indikator->delete();
        return redirect()->back()->with('delete', 'Indikator berhasil dihapus');
    }
}
