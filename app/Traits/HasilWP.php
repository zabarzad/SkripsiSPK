<?php

namespace App\Traits;

use App\Models\BobotKriteria;
use App\Models\Kemampuan;
use App\Models\WpHasil;

trait HasilWP
{
    public function __construct()
    {
        $this->bk = BobotKriteria::first();
    }

    public function hasil_wp_disiplin($penilaian)
    {
        // Cek karyawan ada atau tidak di table HasilWP
        $wp = WpHasil::where('karyawan_id', $penilaian->karyawan_id)->first();

        if ($wp == null) {
            $wp = WpHasil::create([
                'karyawan_id'   => $penilaian->karyawan_id
            ]);
        }

        // Proses data
        $alt_s = 0;

        $alt_s = round($alt_s += ($penilaian->kehadiran ** $this->bk->k1), 2);
        $alt_s = round($alt_s += ($penilaian->seragam ** $this->bk->k2), 2);
        $alt_s = round($alt_s += ($penilaian->kebersihan ** $this->bk->k3), 2);

        if ($penilaian->kemampuan_id != 0) {
            $this->hasil_wp_kemampuan($penilaian);
        } else if ($penilaian->objektivitas_id != 0) {
        }

        $wp->update([
            'alternatif_s' => $alt_s
        ]);

        // Total alternatis_s
        $total_alt_s = WpHasil::select('alternatif_s')->sum('alternatif_s');
        $wp->update([
            'alternatif_v' => round($wp->alternatif_s / $total_alt_s, 2)
        ]);
    }

    public function hasil_wp_kemampuan($kemampuan)
    {
        // GET data WP HASIL sesuai karyawan
        $wp = WpHasil::where('karyawan_id', $kemampuan->karyawan_id)->first();

        // Definisikan alternatif S
        $alt_s = $wp->alternatif_s;

        // Proses data
        $alt_s = round($alt_s += ($kemampuan->kualitas_pekerjaan ** $this->bk->ka), 2);
        $alt_s = round($alt_s += ($kemampuan->kuantitas_pekerjaan ** $this->bk->kb), 2);
        $alt_s = round($alt_s += ($kemampuan->tanggung_jawab ** $this->bk->kc), 2);
        $alt_s = round($alt_s += ($kemampuan->sikap_perilaku ** $this->bk->kd), 2);
        $alt_s = round($alt_s += ($kemampuan->kerja_sama ** $this->bk->ke), 2);
        $alt_s = round($alt_s += ($kemampuan->semangat_kerja ** $this->bk->kf), 2);
        $alt_s = round($alt_s += ($kemampuan->integritas ** $this->bk->kg), 2);
        $alt_s = round($alt_s += ($kemampuan->komunikasi ** $this->bk->kh), 2);
        $alt_s = round($alt_s += ($kemampuan->analisa_solusi ** $this->bk->ki), 2);
        $alt_s = round($alt_s += ($kemampuan->tindak_lanjut ** $this->bk->kj), 2);
        $alt_s = round($alt_s += ($kemampuan->rasa_memiliki ** $this->bk->kk), 2);

        $wp->update([
            'alternatif_s' => $alt_s
        ]);

        // Total alternatis_s
        $total_alt_s = WpHasil::select('alternatif_s')->sum('alternatif_s');
        $wp->update([
            'alternatif_v' => round($wp->alternatif_s / $total_alt_s, 2)
        ]);
    }

    public function hasil_wp_objektivitas($objektivitas)
    {
        // GET data WP HASIL sesuai karyawan
        $wp = WpHasil::where('karyawan_id', $objektivitas->karyawan_id)->first();

        // Definisikan alternatif S
        $alt_s = $wp->alternatif_s;

        // Proses data
        $alt_s = round($alt_s += ($objektivitas->total_poin ** $this->bk->kl), 2);

        $wp->update([
            'alternatif_s' => $alt_s
        ]);

        // Total alternatis_s
        $total_alt_s = WpHasil::select('alternatif_s')->sum('alternatif_s');
        $wp->update([
            'alternatif_v' => round($wp->alternatif_s / $total_alt_s, 2)
        ]);
    }

    public function wp_proses()
    {
        $total_alt_s = WpHasil::select('alternatif_s')->sum('alternatif_s');
        $items       = WpHasil::all();

        foreach ($items as $item) {
            $item->update([
                'alternatif_v' => round($item->alternatif_s / $total_alt_s, 2)
            ]);
        }
    }
}
