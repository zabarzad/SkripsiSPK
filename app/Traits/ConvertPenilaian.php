<?php

namespace App\Traits;

use App\Models\Karyawan;
use App\Models\Penilaian;
use App\Models\SmartNilaiUtility;
use App\Traits\HasilWP;

trait ConvertPenilaian
{
    use HasilWP;

    public function toDisiplin($data)
    {
        // Kehadiran
        $jumlah_kehadiran             = $data->jumlah_kehadiran;
        $sakit                        = $data->sakit * -1;
        $ijin                         = $data->ijin * -2;
        $mangkir                      = $data->mangkir * -3;
        $cuti                         = $data->cuti * 0;
        $terlambat                    = $data->terlambat * -2;
        $total_hari_kerja             = $data->total_hari_kerja;

        // Penampilan
        $kebersihan_diri              = $data->kebersihan_diri;
        $kerapihan_penampilan         = $data->kerapihan_penampilan;
        $kelengkapan_seragam          = $data->kelengkapan_seragam;

        // Kebersihan
        $kebersihan_ruang_kerja       = $data->kebersihan_ruang_kerja;
        $kerapihan_ruang_kerja        = $data->kerapihan_ruang_kerja;
        $merawat_sarana_kerja         = $data->merawat_sarana_kerja;

        // Perhitungan
        $poin_kehadiran                = $jumlah_kehadiran + $sakit + $ijin + $mangkir + $cuti + $terlambat;
        $_score_kehadiran              = round($poin_kehadiran / $total_hari_kerja * 100, 2);
        $_score_penampilan             = round(($kebersihan_diri + $kerapihan_penampilan + $kelengkapan_seragam) / 3, 2);
        $_score_kebersihan_ruang_kerja = round(($kebersihan_ruang_kerja + $kerapihan_ruang_kerja + $merawat_sarana_kerja) / 3, 2);



        // Cek apakah id karyawan telah ada
        $penilaian = Penilaian::where('karyawan_id', $data->karyawan_id)->first();

        if ($penilaian) {
            // Bila ada maka update nilainya
            $penilaian->update([
                'kehadiran'  => $_score_kehadiran,
                'seragam'    => $_score_penampilan,
                'kebersihan' => $_score_kebersihan_ruang_kerja
            ]);

            // $smart = SmartNilaiUtility::where('karyawan_id', $data->karyawan_id)->first();
            // $smart->update([
            //     'karyawan_id' => $data->karyawan_id,
            //     'k1'          => $_score_kehadiran - ((min($karyawan) / max($karyawan)) - min($karyawan)),
            //     'k2'          => $_score_penampilan - ((min($karyawan) / max($karyawan)) - min($karyawan)),
            //     'k3'          => $_score_kebersihan_ruang_kerja - ((min($karyawan) / max($karyawan)) - min($karyawan)),
            // ]);
        } else {

            // Jika tidak ada maka buat baru
            $penilaian = Penilaian::create([
                'karyawan_id'   => $data->karyawan_id,
                'kehadiran'     => $_score_kehadiran,
                'seragam'       => $_score_penampilan,
                'kebersihan'    => $_score_kebersihan_ruang_kerja
            ]);
        }

        // // Get all karyawan
        // $karyawan = Karyawan::all();
        // // Metode Smart
        // SmartNilaiUtility::create([
        //     'karyawan_id' => $data->karyawan_id,
        //     'k1'          => $_score_kehadiran - ((min($karyawan) / max($karyawan)) - min($karyawan)),
        //     'k2'          => $_score_penampilan - ((min($karyawan) / max($karyawan)) - min($karyawan)),
        //     'k3'          => $_score_kebersihan_ruang_kerja - ((min($karyawan) / max($karyawan)) - min($karyawan)),
        // ]);

        $this->hasil_wp_disiplin($penilaian);
    }

    public function deleteDisiplin($data)
    {
        $penilaian = Penilaian::where('karyawan_id', $data->karyawan_id)->first();
        $penilaian->update([
            'kehadiran'     => 0,
            'seragam'       => 0,
            'kebersihan'    => 0,
        ]);
    }
}
