<?php

namespace App\Http\Controllers;

use App\Models\IndikatorKerja;
use App\Models\Karyawan;
use App\Models\ObjDetail;
use App\Models\Objektivitas;
use App\Models\Penilaian;
use App\Models\Posisi;
use App\Models\SmartNilaiUtility;
use App\Models\WpHasil;
use App\Traits\HasilWP;
use Illuminate\Http\Request;

class ObjektivitasController extends Controller
{
    use HasilWP;

    public function index()
    {
        $karyawan = Karyawan::all(); // Digunakan untuk tambah karyawan
        $posisi = Posisi::all(); // Digunakan untuk tambah posisi
        $items = Objektivitas::all();
        $objDetail = ObjDetail::all();
        $indikator = IndikatorKerja::all();

        return view('admin.objektivitas.index', compact('items', 'posisi', 'karyawan', 'indikator', 'objDetail'));
    }

    public function store(Request $request)
    {
        $objektivitas = Objektivitas::create($request->except('_token'));

        $penilaian = Penilaian::where('karyawan_id', $objektivitas->karyawan_id)->first();
        $penilaian->update([
            'objektivitas_id' => $objektivitas->id
        ]);

        // //query all karyawan
        // $karyawan = Karyawan::all();
        // //find karyawan_id on penilaian table
        // $penilaianObjektivitas = Penilaian::find($request->karyawan_id);
        // //find karyawan_id on smart_nilai_utility table
        // $nilaiUlility = SmartNilaiUtility::find($request->karyawan_id);
        // $nilaiUlility->update([
        //     'kl' => $penilaianObjektivitas - ((min($karyawan) / max($karyawan)) - min($karyawan)),
        // ]);

        return redirect()->back()->with('success', 'Objektivitas berhasil ditambahkan');
    }

    public function update(Request $request, Objektivitas $objektivita)
    {
        $nilai = 0;
        $indikator   = count($request->poin);

        for ($i = 0; $i < $indikator; $i++) {
            $item = ObjDetail::create([
                'objektivitas_id'    => $objektivita->id,
                'indikator_kerja_id' => $request->indikator_kerja_id[$i],
                'poin'               => $request->poin[$i]
            ]);

            $nilai = $nilai + $item->poin;
        }

        $total_nilai = round($nilai / $indikator, 2);

        $objektivita->update([
            'total_poin' => $total_nilai
        ]);

        // Metode WP
        $this->hasil_wp_objektivitas($objektivita);

        return redirect()->back()->with('success', 'Objektivitas berhasil ditambahkan');
    }

    public function destroy(Objektivitas $objektivita)
    {
        $penilaian = Penilaian::select('objektivitas_id')->where('karyawan_id', $objektivita->karyawan_id)->first();
        $penilaian->update([
            'objektivitas_id' => 0
        ]);
        ObjDetail::where('objektivitas_id', $objektivita->id)->delete();
        $objektivita->delete();

        return redirect()->back()->with('delete', 'Objektivitas berhasil dihapus');
    }
}
