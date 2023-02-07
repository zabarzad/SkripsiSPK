<?php

namespace App\Traits;

use App\Models\BobotKriteria;
use App\Models\WpHasil;

trait HasilWP
{

    public function __construct()
    {
        $this->bk = BobotKriteria::first();
    }

    public function WP_DISIPLIN($penilaian)
    {
        // Mendapatkan Data Sesuai Karyawan dan Tahun yang dipilih
        $wp = WpHasil::where([
            ['karyawan_id', $penilaian->karyawan_id],
            ['tahun', $penilaian->tahun]
        ])->first();

        // Jika data tidak ada maka buat baru
        if ($wp == null) {
            $wp = WpHasil::create([
                'karyawan_id'   => $penilaian->karyawan_id,
                'tahun'         => $penilaian->tahun
            ]);
        }

        // Memproses dan update nilai Alternatif S
        $alt_s = $wp->alternatif_s;

        $alt_s = round($alt_s += ($penilaian->kehadiran ** $this->bk->k1), 2);
        $alt_s = round($alt_s += ($penilaian->seragam ** $this->bk->k2), 2);
        $alt_s = round($alt_s += ($penilaian->kebersihan ** $this->bk->k3), 2);

        $wp->update([
            'alternatif_s' => $alt_s
        ]);

        // Memproses dan update nilai Alternatif V
        $this->NILAI_ALTERNATIF_V($wp);
    }

    public function WP_KEMAMPUAN($kemampuan)
    {
        // Mendapatkan Data Sesuai Karyawan dan Tahun yang dipilih
        $wp = WpHasil::where([
            ['karyawan_id', $kemampuan->karyawan_id],
            ['tahun', $kemampuan->tahun]
        ])->first();

        // Memproses dan update nilai Alternatif S
        $alt_s = $wp->alternatif_s;

        $alt_s = round($alt_s + ($kemampuan->kualitas_pekerjaan ** $this->bk->ka), 2);
        $alt_s = round($alt_s + ($kemampuan->kuantitas_pekerjaan ** $this->bk->kb), 2);
        $alt_s = round($alt_s + ($kemampuan->tanggung_jawab ** $this->bk->kc), 2);
        $alt_s = round($alt_s + ($kemampuan->sikap_perilaku ** $this->bk->kd), 2);
        $alt_s = round($alt_s + ($kemampuan->kerja_sama ** $this->bk->ke), 2);
        $alt_s = round($alt_s + ($kemampuan->semangat_kerja ** $this->bk->kf), 2);
        $alt_s = round($alt_s + ($kemampuan->integritas ** $this->bk->kg), 2);
        $alt_s = round($alt_s + ($kemampuan->komunikasi ** $this->bk->kh), 2);
        $alt_s = round($alt_s + ($kemampuan->analisa_solusi ** $this->bk->ki), 2);
        $alt_s = round($alt_s + ($kemampuan->tindak_lanjut ** $this->bk->kj), 2);
        $alt_s = round($alt_s + ($kemampuan->rasa_memiliki ** $this->bk->kk), 2);

        $wp->update([
            'alternatif_s' => $alt_s
        ]);

        // Memproses dan update nilai Alternatif V
        $this->NILAI_ALTERNATIF_V($wp);
    }

    public function WP_OBJEKTIVITAS($objektivitas)
    {
        // Mendapatkan Data Sesuai Karyawan dan Tahun yang dipilih
        $wp = WpHasil::where([
            ['karyawan_id', $objektivitas->karyawan_id],
            ['tahun', $objektivitas->tahun]
        ])->first();

        // Memproses dan update nilai Alternatif S
        $alt_s = $wp->alternatif_s;
        $alt_s = round($alt_s += ($objektivitas->total_poin ** $this->bk->kl), 2);
        $wp->update([
            'alternatif_s' => $alt_s
        ]);

        // Memproses dan update nilai Alternatif V
        $this->NILAI_ALTERNATIF_V($wp);
    }

    public function WP_SYNC()
    {
        $total_alt_s = WpHasil::select('alternatif_s')->sum('alternatif_s');
        $items       = WpHasil::all();

        foreach ($items as $item) {
            $item->update([
                'alternatif_v' => round($item->alternatif_s / $total_alt_s, 2)
            ]);
        }
    }

    public function NILAI_ALTERNATIF_V($wp)
    {
        // Rumus untuk mendapatkan nilai total Alternatif S dari semua data
        $total_alt_s = WpHasil::select('alternatif_s')->sum('alternatif_s');

        // Jika nilai Alternatif S dari data yang didapat bernilai 0 maka:
        // Nilai Alternatif V bernilai 0 
        // Namun jika tidak bernilai 0 maka:
        // Update nilai Alternatif V sesuai rumus
        if ($wp->alternatif_s == 0) {
            $wp->update([
                'alternatif_v' => 0
            ]);
        } else {
            $wp->update([
                'alternatif_v' => round($wp->alternatif_s / $total_alt_s, 2)
            ]);
        }
    }

    public function WP_SYNC_ONE($penilaian)
    {

        $this->WP_DISIPLIN($penilaian);

        $this->WP_KEMAMPUAN($penilaian);

        $this->WP_OBJEKTIVITAS($penilaian);
    }
}
