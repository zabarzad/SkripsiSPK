<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Kemampuan;
use App\Models\Penilaian;
use App\Models\SmartNilaiUtility;
use App\Traits\ConvertPenilaian;
use App\Traits\HasilWP;
use Illuminate\Http\Request;

class KemampuanController extends Controller
{
    use HasilWP;
    use ConvertPenilaian;

    public function index()
    {
        $kemampuan = Kemampuan::latest()->get();
        $karyawan = Karyawan::all();

        return view('admin.kemampuan.index', compact('karyawan', 'kemampuan'));
    }

    public function store(Request $request)
    {
        // Mendapatkan data sesuai karyawan dan tahun yang dipilih
        $penilaian = Penilaian::where([
            ['karyawan_id', $request->karyawan_id],
            ['tahun',    $request->tahun]
        ])->first();

        // Jika data yang didapatkan tidak ada maka:
        // Muncul alert untuk menambahkan data nilai disiplin 
        if ($penilaian == null || ($penilaian->kehadiran == 0 && $penilaian->seragam == 0 && $penilaian->kebersihan == 0)) {
            return redirect()->route('kemampuan.index')->with('delete', 'Anda belum menambahkan Nilai Disiplin untuk karyawan yang dipilih');
        }

        // Buat data kemampuan 
        $kemampuan = Kemampuan::create($request->except('_token', 'method'));

        // Update data ke Tabel Penilaian
        $penilaian->update([
            'kemampuan_id' => $kemampuan->id
        ]);

        // Update nilai pada metode WP
        // $this->WP_KEMAMPUAN($kemampuan);

        // // Metode Smart
        // $karyawan = Karyawan::all();

        // //laravel find and update
        // $nilaiUlility = SmartNilaiUtility::find($request->karyawan_id);
        // $nilaiUlility->update([
        //     'ka' => $request->kualitas_pekerjaan - ((min($karyawan) / max($karyawan)) - min($karyawan)),
        //     'kb' => $request->kuantitas_pekerjaan - ((min($karyawan) / max($karyawan)) - min($karyawan)),
        //     'kc' => $request->tanggung_jawab - ((min($karyawan) / max($karyawan)) - min($karyawan)),
        //     'kd' => $request->sikap_perilaku - ((min($karyawan) / max($karyawan)) - min($karyawan)),
        //     'ke' => $request->kerja_sama - ((min($karyawan) / max($karyawan)) - min($karyawan)),
        //     'kf' => $request->semangat_kerja - ((min($karyawan) / max($karyawan)) - min($karyawan)),
        //     'kg' => $request->integritas - ((min($karyawan) / max($karyawan)) - min($karyawan)),
        //     'kh' => $request->komunikasi - ((min($karyawan) / max($karyawan)) - min($karyawan)),
        //     'ki' => $request->analisa_solusi - ((min($karyawan) / max($karyawan)) - min($karyawan)),
        //     'kj' => $request->tindak_lanjut - ((min($karyawan) / max($karyawan)) - min($karyawan)),
        //     'kk' => $request->rasa_memiliki - ((min($karyawan) / max($karyawan)) - min($karyawan)),
        // ]);

        return redirect()->route('kemampuan.index')->with('success', 'Data Disiplin Berhasil Ditambahkan');
    }

    // !! Method ini belum digunakan
    public function update(Request $request, Kemampuan $kemampuan)
    {
        $kemampuan->update($request->except('_token', 'method'));

        return redirect()->route('kemampuan.index')->with('success', 'Data kemampuan Berhasil Diubah');
    }

    public function destroy(Kemampuan $kemampuan)
    {
        // Delete di table penilaian
        $this->DELETE_KEMAMPUAN($kemampuan);
        $kemampuan->delete();

        return redirect()->route('kemampuan.index')->with('success', 'Data Kemampuan Berhasil Dihapus');
    }
}
