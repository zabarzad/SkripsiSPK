<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Kemampuan;
use App\Models\Penilaian;
use App\Models\SmartNilaiUtility;
use App\Traits\HasilWP;
use Illuminate\Http\Request;

class KemampuanController extends Controller
{
    use HasilWP;

    public function index()
    {
        $kemampuan = Kemampuan::latest()->get();
        $karyawan = Karyawan::all();

        return view('admin.kemampuan.index', compact('karyawan', 'kemampuan'));
    }

    public function store(Request $request)
    {
        $kemampuan = Kemampuan::create($request->except('_token', 'method'));

        // Input ke Table Penilaian
        Penilaian::where('karyawan_id', $kemampuan->karyawan_id)->update([
            'kemampuan_id' => $kemampuan->id
        ]);

        // Metode WP
        $this->hasil_wp_kemampuan($kemampuan);

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


    public function update(Request $request, Kemampuan $kemampuan)
    {
        $kemampuan->update($request->except('_token', 'method'));

        return redirect()->route('kemampuan.index')->with('success', 'Data kemampuan Berhasil Diubah');
    }

    public function destroy(Kemampuan $kemampuan)
    {
        // Delete di table penilaian
        Penilaian::where('karyawan_id', $kemampuan->karyawan_id)->update([
            'kemampuan_id' => 0
        ]);
        $kemampuan->delete();

        return redirect()->route('kemampuan.index')->with('success', 'Data Kemampuan Berhasil Dihapus');
    }
}
