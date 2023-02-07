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
        $data = Disiplin::where([
            ['karyawan_id', $request->karyawan_id],
            ['tahun', $request->tahun]
        ])->first();

        if ($data) {
            return redirect()->route('disiplin.index')->with('delete', 'Data Disiplin Telah Ada');
        } else {
            $data = Disiplin::create($request->except('_token', 'method'));
            $this->STORE_DISIPLIN($data);
        }

        return redirect()->route('disiplin.index')->with('success', 'Data Disiplin Berhasil Ditambahkan');
    }

    public function update(Request $request, Disiplin $disiplin)
    {
        $disiplin->update($request->except('_token', 'method'));
        $this->STORE_DISIPLIN($disiplin);

        return redirect()->route('disiplin.index')->with('success', 'Data Disiplin Berhasil Diubah');
    }

    public function destroy(Disiplin $disiplin)
    {
        // Delete di table penilaian
        $this->DELETE_DISIPLIN($disiplin);
        $disiplin->delete();

        return redirect()->route('disiplin.index')->with('success', 'Data Disiplin Berhasil Dihapus');
    }
}
