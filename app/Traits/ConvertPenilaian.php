<?php

namespace App\Traits;

use App\Models\Penilaian;
use App\Traits\HasilWP;
use Illuminate\Support\Facades\DB;

trait ConvertPenilaian
{
    use HasilWP;

    public function STORE_DISIPLIN($data)
    {
        DB::beginTransaction();
        try {
            // Memproses nilai untuk kehadiran
            $jumlah_kehadiran             = $data->jumlah_kehadiran;
            $sakit                        = $data->sakit * -1;
            $ijin                         = $data->ijin * -2;
            $mangkir                      = $data->mangkir * -3;
            $cuti                         = $data->cuti * 0;
            $terlambat                    = $data->terlambat * -2;
            $total_hari_kerja             = $data->total_hari_kerja;

            // Memproses nilai untuk penampilan
            $kebersihan_diri              = $data->kebersihan_diri;
            $kerapihan_penampilan         = $data->kerapihan_penampilan;
            $kelengkapan_seragam          = $data->kelengkapan_seragam;

            // Memproses nilai untuk kebersihan
            $kebersihan_ruang_kerja       = $data->kebersihan_ruang_kerja;
            $kerapihan_ruang_kerja        = $data->kerapihan_ruang_kerja;
            $merawat_sarana_kerja         = $data->merawat_sarana_kerja;

            // Memproses nilai untuk score kehadiran 
            $poin_kehadiran                = $jumlah_kehadiran + $sakit + $ijin + $mangkir + $cuti + $terlambat;
            $_score_kehadiran              = round($poin_kehadiran / $total_hari_kerja * 100, 2);

            if ($_score_kehadiran < 50) {
                $_score_kehadiran = 0;
            } else if ($_score_kehadiran < 65) {
                $_score_kehadiran = 2;
            } else if ($_score_kehadiran < 77) {
                $_score_kehadiran = 5;
            } else if ($_score_kehadiran < 90) {
                $_score_kehadiran = 6;
            } else if ($_score_kehadiran < 100) {
                $_score_kehadiran = 8;
            } else if ($_score_kehadiran == 100) {
                $_score_kehadiran = 10;
            } else {
                $_score_kehadiran = -1;
            }

            // Memproses nilai untuk score penampilan dan kebersihan ruang kerja 
            $_score_penampilan             = round(($kebersihan_diri + $kerapihan_penampilan + $kelengkapan_seragam) / 3, 2);
            $_score_kebersihan_ruang_kerja = round(($kebersihan_ruang_kerja + $kerapihan_ruang_kerja + $merawat_sarana_kerja) / 3, 2);

            // Mendapatkan data sesuai karyawan dan tahun yang dipilih
            $penilaian = Penilaian::where([
                ['karyawan_id', $data->karyawan_id],
                ['tahun', $data->tahun]
            ])->first();

            // Jika data ada maka update 
            // Namun jika tidak ada maka create baru
            if ($penilaian) {
                $penilaian->update([
                    'kehadiran'  => $_score_kehadiran,
                    'tahun'      => $data->tahun,
                    'seragam'    => $_score_penampilan,
                    'kebersihan' => $_score_kebersihan_ruang_kerja
                ]);

            } else {
                $penilaian = Penilaian::create([
                    'karyawan_id'   => $data->karyawan_id,
                    'tahun'         => $data->tahun,
                    'kehadiran'     => $_score_kehadiran,
                    'seragam'       => $_score_penampilan,
                    'kebersihan'    => $_score_kebersihan_ruang_kerja
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    public function DELETE_DISIPLIN($data)
    {
        $penilaian = Penilaian::where([
            ['karyawan_id', $data->karyawan_id],
            ['tahun', $data->tahun]
        ])->first();

        if ($penilaian) {
            $penilaian->update([
                'kehadiran'     => 0,
                'seragam'       => 0,
                'kebersihan'    => 0,
            ]);
            $this->WP_SYNC_ONE($penilaian);
        }
    }

    public function DELETE_KEMAMPUAN($data)
    {
        $penilaian = Penilaian::where([
            ['karyawan_id', $data->karyawan_id],
            ['tahun', $data->tahun]
        ])->first();

        $penilaian->update([
            'kemampuan_id' => 0
        ]);

        $this->WP_SYNC_ONE($penilaian);
    }

    public function DELETE_OBJEKTIVITAS($data)
    {
        $penilaian = Penilaian::where([
            ['karyawan_id', $data->karyawan_id],
            ['tahun', $data->tahun]
        ])->first();

        $penilaian->update([
            'objektivitas_id' => 0
        ]);

        $this->WP_SYNC_ONE($penilaian);
    }
}
