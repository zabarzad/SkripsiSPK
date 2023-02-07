<?php

namespace App\Http\Controllers;

use App\Models\BobotKriteria;
use Illuminate\Http\Request;

class BobotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bobotKriteria = BobotKriteria::all();

        return view('admin.bobot.index', compact('bobotKriteria'));
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
        $bobotKriteria = new BobotKriteria;
        $bobotKriteria->fill($request->all());
        $bobotKriteria->save();

        return redirect()->back()->with('success', 'Bobot Kriteria berhasil ditambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BobotKriteria $bobot)
    {
        $bobot->update($request->except('_token'));
        return redirect()->back()->with('success', 'Bobot Kriteria berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BobotKriteria $bobot)
    {
        $bobot->delete();
        return redirect()->back()->with('delete', 'Bobot Kriteria berhasil dihapus');
    }
}
