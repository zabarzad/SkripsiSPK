<?php

namespace App\Http\Controllers;

use App\Models\Disiplin;
use App\Models\Karyawan;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use App\Traits\ConvertPenilaian;

class DisiplinController extends Controller
{
    use ConvertPenilaian;

    public function index()
    {
        $karyawan = Karyawan::all();
        $penilaian = Penilaian::with('karyawan')->get();
        $disiplin = Disiplin::latest()->get();

        return view('admin.disiplin.index', compact('karyawan', 'disiplin', 'penilaian'));
    }

    public function store(Request $request)
    {
        $data = Disiplin::create($request->except('_token', 'method'));
        $this->toDisiplin($data);

        return redirect()->route('disiplin.index')->with('success', 'Data Disiplin Berhasil Ditambahkan');
    }

    public function update(Request $request, Disiplin $disiplin)
    {
        $disiplin->update($request->except('_token', 'method'));
        $this->toDisiplin($disiplin);

        return redirect()->route('disiplin.index')->with('success', 'Data Disiplin Berhasil Diubah');
    }

    public function destroy(Disiplin $disiplin)
    {
        // Delete di table penilaian
        $this->deleteDisiplin($disiplin);
        $disiplin->delete();

        return redirect()->route('disiplin.index')->with('success', 'Data Disiplin Berhasil Dihapus');
    }
}
