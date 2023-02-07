<?php

namespace App\Http\Controllers;

use App\Models\IndikatorKerja;
use App\Models\Karyawan;
use App\Models\ObjDetail;
use App\Models\Objektivitas;
use App\Models\Penilaian;
use App\Models\Posisi;
use App\Traits\ConvertPenilaian;
use App\Traits\HasilSmart;
use App\Traits\HasilTopsis;
use App\Traits\HasilWP;
use Illuminate\Http\Request;

class ObjektivitasController extends Controller
{
    use HasilWP;
    use HasilTopsis;
    use HasilSmart;
    use ConvertPenilaian;

    public function index()
    {
        $karyawan   = Karyawan::all(); // Digunakan untuk tambah karyawan
        $posisi     = Posisi::all(); // Digunakan untuk tambah posisi
        $items      = Objektivitas::all();
        $objDetail  = ObjDetail::all();
        $indikator  = IndikatorKerja::all();

        return view('admin.objektivitas.index', compact('items', 'posisi', 'karyawan', 'indikator', 'objDetail'));
    }

    public function store(Request $request)
    {
        // Mendapatkan data sesuai karyawan dan tahun yang dipilih
        $penilaian = Penilaian::where([
            ['karyawan_id', $request->karyawan_id],
            ['tahun', $request->tahun]
        ])->first();

        // Pengecekan apakah data penilaian kemampuan ada/tidak
        if ($penilaian == null || $penilaian->kemampuan_id == 0) {
            return redirect()->route('objektivitas.index')->with('delete', 'Anda belum menambahkan Nilai Kemampuan Umum untuk karyawan yang dipilih');
        }

        // Pengecekan apakah data penilaian disiplin ada/tidak
        if ($penilaian->kehadiran == 0 || $penilaian->seragam == 0 || $penilaian->kebersihan == 0) {
            return redirect()->route('objektivitas.index')->with('delete', 'Anda belum menambahkan Nilai Disiplin untuk karyawan yang dipilih');
        }

        // Membuat nilai objektivitas dan mengupdate pada tabel penilaian
        $objektivitas = Objektivitas::create($request->except('_token', 'method'));

        $penilaian->update([
            'objektivitas_id' => $objektivitas->id
        ]);

        return redirect()->back()->with('success', 'Objektivitas berhasil ditambahkan');
    }

    public function update(Request $request, Objektivitas $objektivita)
    {
        $nilai      = 0;
        $indikator  = count($request->poin);

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

        // Mendapatkan data sesuai karyawan dan tahun yang dipilih
        $penilaian = Penilaian::where([
            ['karyawan_id', $objektivita->karyawan_id],
            ['tahun', $objektivita->tahun]
        ])->first();

        // Update nilai pada tiap metode
        $this->WP_SYNC_ONE($penilaian);
        $this->TOPSIS_SYNC($penilaian);
        $this->SMART_SYNC($penilaian);

        return redirect()->back()->with('success', 'Objektivitas berhasil ditambahkan');
    }

    public function destroy(Objektivitas $objektivita)
    {
        $this->DELETE_OBJEKTIVITAS($objektivita);
        ObjDetail::where('objektivitas_id', $objektivita->id)->delete();
        $objektivita->delete();

        return redirect()->back()->with('delete', 'Objektivitas berhasil dihapus');
    }
}
