<?php

namespace App\Traits;

use App\Models\Kemampuan;
use App\Models\Objektivitas;
use App\Models\Penilaian;
use App\Models\TopsisHasil;
use App\Models\TopsisKeputusanTerbobot;
use App\Models\TopsisKeputusanTernormalisasi;
use App\Models\TopsisNilaiMaxMin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

trait HasilTopsis
{
    // public function __construct()
    // {
    //     $this->bk = BobotKriteria::first();
    // }

    public function TOPSIS_TERNORMALISASI()
    {
        $penilaian = Penilaian::all();

        $k1 = 0;
        $k2 = 0;
        $k3 = 0;
        $ka = 0;
        $kb = 0;
        $kc = 0;
        $kd = 0;
        $ke = 0;
        $kf = 0;
        $kg = 0;
        $kh = 0;
        $ki = 0;
        $kj = 0;
        $kk = 0;
        $kl = 0;

        foreach ($penilaian as $item) {
            $kemampuan = Kemampuan::where([
                ['id', $item->kemampuan_id],
                ['tahun', $item->tahun]
            ])->first();

            $objektivitas = Objektivitas::where([
                ['id', $item->objektivitas_id],
                ['tahun', $item->tahun]
            ])->first();

            $k1 = $k1 + ($item->kehadiran ** 2);
            $k2 = $k2 + ($item->seragam ** 2);
            $k3 = $k3 + ($item->kebersihan ** 2);
            $ka = $ka + ($kemampuan->kualitas_pekerjaan ** 2);
            $kb = $kb + ($kemampuan->kuantitas_pekerjaan ** 2);
            $kc = $kc + ($kemampuan->tanggung_jawab ** 2);
            $kd = $kd + ($kemampuan->sikap_perilaku ** 2);
            $ke = $ke + ($kemampuan->kerja_sama ** 2);
            $kf = $kf + ($kemampuan->semangat_kerja ** 2);
            $kg = $kg + ($kemampuan->integritas ** 2);
            $kh = $kh + ($kemampuan->komunikasi ** 2);
            $ki = $ki + ($kemampuan->analisa_solusi ** 2);
            $kj = $kj + ($kemampuan->tindak_lanjut ** 2);
            $kk = $kk + ($kemampuan->rasa_memiliki ** 2);
            $kl = $kl + ($objektivitas->total_poin ** 2);
        }

        foreach ($penilaian as $p) {
            $kemampuan = Kemampuan::where([
                ['id', $p->kemampuan_id],
                ['tahun', $p->tahun]
            ])->first();

            $objektivitas = Objektivitas::where([
                ['id', $p->objektivitas_id],
                ['tahun', $p->tahun]
            ])->first();

            TopsisKeputusanTernormalisasi::create([
                'karyawan_id' => $p->karyawan_id,
                'tahun'       => $p->tahun,
                'k1'          => round($p->kehadiran / sqrt($k1), 4),
                'k2'          => round($p->seragam / sqrt($k2), 4),
                'k3'          => round($p->kebersihan / sqrt($k3), 4),
                'ka'          => round($kemampuan->kualitas_pekerjaan / sqrt($ka), 4),
                'kb'          => round($kemampuan->kuantitas_pekerjaan / sqrt($kb), 4),
                'kc'          => round($kemampuan->tanggung_jawab / sqrt($kc), 4),
                'kd'          => round($kemampuan->sikap_perilaku / sqrt($kd), 4),
                'ke'          => round($kemampuan->kerja_sama / sqrt($ke), 4),
                'kf'          => round($kemampuan->semangat_kerja / sqrt($kf), 4),
                'kg'          => round($kemampuan->integritas / sqrt($kg), 4),
                'kh'          => round($kemampuan->komunikasi / sqrt($kh), 4),
                'ki'          => round($kemampuan->analisa_solusi / sqrt($ki), 4),
                'kj'          => round($kemampuan->tindak_lanjut / sqrt($kj), 4),
                'kk'          => round($kemampuan->rasa_memiliki / sqrt($kk), 4),
                'kl'          => round($objektivitas->total_poin / sqrt($kl), 4)
            ]);
        }
    }

    public function TOPSIS_TERNORMALISASI_TERBOBOT($p)
    {
        $topsis_ternomalisasi = TopsisKeputusanTernormalisasi::where([
            ['karyawan_id', $p->karyawan_id],
            ['tahun', $p->tahun]
        ])->first();

        TopsisKeputusanTerbobot::create([
            'karyawan_id' => $p->karyawan_id,
            'tahun'       => $p->tahun,
            'k1'          => $topsis_ternomalisasi->k1 * $this->bk->k1,
            'k2'          => $topsis_ternomalisasi->k2 * $this->bk->k2,
            'k3'          => $topsis_ternomalisasi->k3 * $this->bk->k3,
            'ka'          => $topsis_ternomalisasi->ka * $this->bk->ka,
            'kb'          => $topsis_ternomalisasi->kb * $this->bk->kb,
            'kc'          => $topsis_ternomalisasi->kc * $this->bk->kc,
            'kd'          => $topsis_ternomalisasi->kd * $this->bk->kd,
            'ke'          => $topsis_ternomalisasi->ke * $this->bk->ke,
            'kf'          => $topsis_ternomalisasi->kf * $this->bk->kf,
            'kg'          => $topsis_ternomalisasi->kg * $this->bk->kg,
            'kh'          => $topsis_ternomalisasi->kh * $this->bk->kh,
            'ki'          => $topsis_ternomalisasi->ki * $this->bk->ki,
            'kj'          => $topsis_ternomalisasi->kj * $this->bk->kj,
            'kk'          => $topsis_ternomalisasi->kk * $this->bk->kk,
            'kl'          => $topsis_ternomalisasi->kl * $this->bk->kl,
        ]);
    }

    public function TOPSIS_MAX_MIN()
    {
        // Mendapatkan nilai Min
        $data_min = TopsisKeputusanTerbobot::select('tahun', DB::raw('MIN(k1) as k1'), DB::raw('MIN(k2) as k2'), DB::raw('MIN(k3) as k3'), DB::raw('MIN(ka) as ka'), DB::raw('MIN(kb) as kb'), DB::raw('MIN(kc) as kc'), DB::raw('MIN(kd) as kd'), DB::raw('MIN(ke) as ke'), DB::raw('MIN(kf) as kf'), DB::raw('MIN(kg) as kg'), DB::raw('MIN(kh) as kh'), DB::raw('MIN(ki) as ki'), DB::raw('MIN(kj) as kj'), DB::raw('MIN(kk) as kk'), DB::raw('MIN(kl) as kl'))
            ->groupBy('tahun')
            ->first();

        // Cek apakah tahun tersebut telah ada
        $min_first = TopsisNilaiMaxMin::where([
            ['tahun', $data_min->tahun],
            ['type', 'min']
        ])->first();

        if ($min_first != null) {
            $min_first->update([
                'k1'    => $data_min->k1,
                'k2'    => $data_min->k2,
                'k3'    => $data_min->k3,
                'ka'    => $data_min->ka,
                'kb'    => $data_min->kb,
                'kc'    => $data_min->kc,
                'kd'    => $data_min->kd,
                'ke'    => $data_min->ke,
                'kf'    => $data_min->kf,
                'kg'    => $data_min->kg,
                'kh'    => $data_min->kh,
                'ki'    => $data_min->ki,
                'kj'    => $data_min->kj,
                'kk'    => $data_min->kk,
                'kl'    => $data_min->kl,
            ]);
        } else {
            TopsisNilaiMaxMin::create([
                'tahun' => $data_min->tahun,
                'type'  => 'min',
                'k1'    => $data_min->k1,
                'k2'    => $data_min->k2,
                'k3'    => $data_min->k3,
                'ka'    => $data_min->ka,
                'kb'    => $data_min->kb,
                'kc'    => $data_min->kc,
                'kd'    => $data_min->kd,
                'ke'    => $data_min->ke,
                'kf'    => $data_min->kf,
                'kg'    => $data_min->kg,
                'kh'    => $data_min->kh,
                'ki'    => $data_min->ki,
                'kj'    => $data_min->kj,
                'kk'    => $data_min->kk,
                'kl'    => $data_min->kl,
            ]);
        }

        // Mendapatkan Nilai Max
        $data_max = TopsisKeputusanTerbobot::select('tahun', DB::raw('MAX(k1) as k1'), DB::raw('MAX(k2) as k2'), DB::raw('MAX(k3) as k3'), DB::raw('MAX(ka) as ka'), DB::raw('MAX(kb) as kb'), DB::raw('MAX(kc) as kc'), DB::raw('MAX(kd) as kd'), DB::raw('MAX(ke) as ke'), DB::raw('MAX(kf) as kf'), DB::raw('MAX(kg) as kg'), DB::raw('MAX(kh) as kh'), DB::raw('MAX(ki) as ki'), DB::raw('MAX(kj) as kj'), DB::raw('MAX(kk) as kk'), DB::raw('MAX(kl) as kl'))
            ->groupBy('tahun')
            ->first();

        $max_first = TopsisNilaiMaxMin::where([
            ['tahun', $data_max->tahun],
            ['type', 'max']
        ])->first();

        if ($max_first != null) {
            $max_first->update([
                'k1'    => $data_min->k1,
                'k2'    => $data_min->k2,
                'k3'    => $data_min->k3,
                'ka'    => $data_min->ka,
                'kb'    => $data_min->kb,
                'kc'    => $data_min->kc,
                'kd'    => $data_min->kd,
                'ke'    => $data_min->ke,
                'kf'    => $data_min->kf,
                'kg'    => $data_min->kg,
                'kh'    => $data_min->kh,
                'ki'    => $data_min->ki,
                'kj'    => $data_min->kj,
                'kk'    => $data_min->kk,
                'kl'    => $data_min->kl,
            ]);
        } else {
            TopsisNilaiMaxMin::create([
                'tahun' => $data_max->tahun,
                'type'  => 'max',
                'k1'    => $data_max->k1,
                'k2'    => $data_max->k2,
                'k3'    => $data_max->k3,
                'ka'    => $data_max->ka,
                'kb'    => $data_max->kb,
                'kc'    => $data_max->kc,
                'kd'    => $data_max->kd,
                'ke'    => $data_max->ke,
                'kf'    => $data_max->kf,
                'kg'    => $data_max->kg,
                'kh'    => $data_max->kh,
                'ki'    => $data_max->ki,
                'kj'    => $data_max->kj,
                'kk'    => $data_max->kk,
                'kl'    => $data_max->kl,
            ]);
        }
    }

    public function TOPSIS_SYNC($penilaian)
    {
        $this->TOPSIS_TERNORMALISASI();
        $this->TOPSIS_TERNORMALISASI_TERBOBOT($penilaian);
        $this->TOPSIS_MAX_MIN();
        $this->TOPSIS_TOTAL($penilaian);
    }

    public function TOPSIS_TOTAL($penilaian)
    {
        // Mendapatkan Nilai Max sesuai tahun yang dipilih
        $data_max   = TopsisNilaiMaxMin::where([
            ['tahun', $penilaian->tahun],
            ['type', 'max']
        ])->first();

        // Mendapatkan data karyawan dan tahun yang dipilih
        $data_normalisasi_terbobot = TopsisKeputusanTerbobot::where([
            ['karyawan_id', $penilaian->karyawan_id],
            ['tahun', $penilaian->tahun]
        ])->first();

        $d_max = 0;
        $d_max = $d_max + ($data_max->k1 - $data_normalisasi_terbobot->k1) ** 2;
        $d_max = $d_max + ($data_max->k2 - $data_normalisasi_terbobot->k2) ** 2;
        $d_max = $d_max + ($data_max->k3 - $data_normalisasi_terbobot->k3) ** 2;
        $d_max = $d_max + ($data_max->ka - $data_normalisasi_terbobot->ka) ** 2;
        $d_max = $d_max + ($data_max->kb - $data_normalisasi_terbobot->kb) ** 2;
        $d_max = $d_max + ($data_max->kc - $data_normalisasi_terbobot->kc) ** 2;
        $d_max = $d_max + ($data_max->kd - $data_normalisasi_terbobot->kd) ** 2;
        $d_max = $d_max + ($data_max->ke - $data_normalisasi_terbobot->ke) ** 2;
        $d_max = $d_max + ($data_max->kf - $data_normalisasi_terbobot->kf) ** 2;
        $d_max = $d_max + ($data_max->kg - $data_normalisasi_terbobot->kg) ** 2;
        $d_max = $d_max + ($data_max->kh - $data_normalisasi_terbobot->kh) ** 2;
        $d_max = $d_max + ($data_max->ki - $data_normalisasi_terbobot->ki) ** 2;
        $d_max = $d_max + ($data_max->kj - $data_normalisasi_terbobot->kj) ** 2;
        $d_max = $d_max + ($data_max->kk - $data_normalisasi_terbobot->kk) ** 2;
        $d_max = $d_max + ($data_max->k1 - $data_normalisasi_terbobot->kl) ** 2;

        $d_max = sqrt($d_max);

        // Mendapatkan Nilai Min sesuai tahun yang dipilih
        $data_min   = TopsisNilaiMaxMin::where([
            ['tahun', $penilaian->tahun],
            ['type', 'min']
        ])->first();

        $d_min = 0;
        $d_min = $d_min + ($data_min->k1 - $data_normalisasi_terbobot->k1) ** 2;
        $d_min = $d_min + ($data_min->k2 - $data_normalisasi_terbobot->k2) ** 2;
        $d_min = $d_min + ($data_min->k3 - $data_normalisasi_terbobot->k3) ** 2;
        $d_min = $d_min + ($data_min->ka - $data_normalisasi_terbobot->ka) ** 2;
        $d_min = $d_min + ($data_min->kb - $data_normalisasi_terbobot->kb) ** 2;
        $d_min = $d_min + ($data_min->kc - $data_normalisasi_terbobot->kc) ** 2;
        $d_min = $d_min + ($data_min->kd - $data_normalisasi_terbobot->kd) ** 2;
        $d_min = $d_min + ($data_min->ke - $data_normalisasi_terbobot->ke) ** 2;
        $d_min = $d_min + ($data_min->kf - $data_normalisasi_terbobot->kf) ** 2;
        $d_min = $d_min + ($data_min->kg - $data_normalisasi_terbobot->kg) ** 2;
        $d_min = $d_min + ($data_min->kh - $data_normalisasi_terbobot->kh) ** 2;
        $d_min = $d_min + ($data_min->ki - $data_normalisasi_terbobot->ki) ** 2;
        $d_min = $d_min + ($data_min->kj - $data_normalisasi_terbobot->kj) ** 2;
        $d_min = $d_min + ($data_min->kk - $data_normalisasi_terbobot->kk) ** 2;
        $d_min = $d_min + ($data_min->k1 - $data_normalisasi_terbobot->kl) ** 2;

        $d_min = sqrt($d_min);

        // Mendapatkan Nilai Preferensi
        if ($d_min == 0 && $d_max == 0) {
            $nilai_preferensi = 0;
        } else {
            $nilai_preferensi = $d_min / ($d_min + $d_max);
        }

        TopsisHasil::create([
            'karyawan_id'       => $penilaian->karyawan_id,
            'tahun'             => $penilaian->tahun,
            'd_max'             => $d_max,
            'd_min'             => $d_min,
            'nilai_preferensi'  => $nilai_preferensi
        ]);
    }
}
