<?php

namespace App\Http\Controllers;

use App\Models\Posisi;
use Illuminate\Http\Request;

class PosisiController extends Controller
{
    public function index()
    {
        $items = Posisi::latest()->get();
        return view('admin.posisi.index', compact('items'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Posisi::create($request->except('_token'));
        return redirect()->back()->with('success', 'Posisi berhasil ditambahkan');
    }

    public function show(Posisi $posisi)
    {
        //
    }

    public function edit(Posisi $posisi)
    {
        //
    }

    public function update(Request $request, Posisi $posisi)
    {
        $posisi->update($request->except('_token'));
        return redirect()->back()->with('success', 'Posisi berhasil diubah');
    }

    public function destroy(Posisi $posisi)
    {
        $posisi->delete();
        return redirect()->back()->with('delete', 'Posisi berhasil dihapus');
    }
}
