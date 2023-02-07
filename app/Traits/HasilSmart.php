<?php

namespace App\Traits;

use App\Models\BobotKriteria;
use App\Models\Karyawan;
use App\Models\Kemampuan;
use App\Models\Objektivitas;
use App\Models\Penilaian;
use App\Models\SmartHasil;
use App\Models\SmartNilaiUtility;
use Illuminate\Support\Facades\DB;

trait HasilSmart
{
    // public function __construct()
    // {
    //     $this->bk = BobotKriteria::first();
    // }

    public function SMART_TERNORMALISASI()
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
            $k1 = sqrt($k1 + ($item->kehadiran ** 2));
            $k2 = sqrt($k2 + ($item->seragam ** 2));
            $k3 = sqrt($k3 + ($item->kebersihan ** 2));
            $ka = sqrt($ka + ($item->kualitas_pekerjaan ** 2));
            $kb = sqrt($kb + ($item->kuantitas_pekerjaan ** 2));
            $kc = sqrt($kc + ($item->tanggung_jawab ** 2));
            $kd = sqrt($kd + ($item->sikap_perilaku ** 2));
            $ke = sqrt($ke + ($item->kerja_sama ** 2));
            $kf = sqrt($kf + ($item->semangat_kerja ** 2));
            $kg = sqrt($kg + ($item->integritas ** 2));
            $kh = sqrt($kh + ($item->komunikasi ** 2));
            $ki = sqrt($ki + ($item->analisa_solusi ** 2));
            $kj = sqrt($kj + ($item->tindak_lanjut ** 2));
            $kk = sqrt($kk + ($item->rasa_memiliki ** 2));
            $kl = sqrt($kl + ($item->total_poin ** 2));
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

            $allPenilaianKaryawan = Penilaian::all();

            SmartNilaiUtility::create([
                'karyawan_id' => $p->karyawan_id,
                'tahun'       => $p->tahun,
                'k1'          => ($p->kehadiran - min($allPenilaianKaryawan))/max($allPenilaianKaryawan)-min($allPenilaianKaryawan),
                'k2'          => ($p->seragam - min($allPenilaianKaryawan))/max($allPenilaianKaryawan)-min($allPenilaianKaryawan),
                'k3'          => ($p->kebersihan  - min($allPenilaianKaryawan))/max($allPenilaianKaryawan)-min($allPenilaianKaryawan),
                'ka'          => ($kemampuan->kualitas_pekerjaan  - min($allPenilaianKaryawan))/max($allPenilaianKaryawan)-min($allPenilaianKaryawan),
                'kb'          => ($kemampuan->kuantitas_pekerjaan - min($allPenilaianKaryawan))/max($allPenilaianKaryawan)-min($allPenilaianKaryawan),
                'kc'          => ($kemampuan->tanggung_jawab  - min($allPenilaianKaryawan))/max($allPenilaianKaryawan)-min($allPenilaianKaryawan),
                'kd'          => ($kemampuan->sikap_perilaku  - min($allPenilaianKaryawan))/max($allPenilaianKaryawan)-min($allPenilaianKaryawan),
                'ke'          => ($kemampuan->kerja_sama  - min($allPenilaianKaryawan))/max($allPenilaianKaryawan)-min($allPenilaianKaryawan),
                'kf'          => ($kemampuan->semangat_kerja  - min($allPenilaianKaryawan))/max($allPenilaianKaryawan)-min($allPenilaianKaryawan),
                'kg'          => ($kemampuan->integritas  - min($allPenilaianKaryawan))/max($allPenilaianKaryawan)-min($allPenilaianKaryawan),
                'kh'          => ($kemampuan->komunikasi  - min($allPenilaianKaryawan))/max($allPenilaianKaryawan)-min($allPenilaianKaryawan),
                'ki'          => ($kemampuan->analisa_solusi  - min($allPenilaianKaryawan))/max($allPenilaianKaryawan)-min($allPenilaianKaryawan),
                'kj'          => ($kemampuan->tindak_lanjut  - min($allPenilaianKaryawan))/max($allPenilaianKaryawan)-min($allPenilaianKaryawan),
                'kk'          => ($kemampuan->rasa_memiliki  - min($allPenilaianKaryawan))/max($allPenilaianKaryawan)-min($allPenilaianKaryawan),
                'kl'          => ($objektivitas->total_poin  - min($allPenilaianKaryawan))/max($allPenilaianKaryawan)-min($allPenilaianKaryawan),
            ]);
        }
    }


    public function SMART_TOTAL($penilaian)
    {

        foreach ($penilaian as $p) {
            $kemampuan = Kemampuan::where([
                ['id', $p->kemampuan_id],
                ['tahun', $p->tahun]
            ])->first();

            $objektivitas = Objektivitas::where([
                ['id', $p->objektivitas_id],
                ['tahun', $p->tahun]
            ])->first();

            $allKaryawan = Karyawan::all();

            SmartHasil::create([
                'karyawan_id' => $penilaian->karyawan_id,
                'tahun'  => $penilaian->tahun,
                'k1'  => ($p->kehadiran - min($allKaryawan)) / max($allKaryawan) - min($allKaryawan) * $this->bk->k1,
                'k2'  => ($p->seragam - min($allKaryawan)) / max($allKaryawan) - min($allKaryawan) * $this->bk->k2,
                'k3'  => ($p->kebersihan - min($allKaryawan)) / max($allKaryawan) - min($allKaryawan) * $this->bk->k3,
                'ka'  => ($kemampuan->kualitas_pekerjaan - min($allKaryawan)) / max($allKaryawan) - min($allKaryawan) * $this->bk->ka,
                'kb'  => ($kemampuan->kualitas_pekerjaan - min($allKaryawan)) / max($allKaryawan) - min($allKaryawan) * $this->bk->kb,
                'kc'  => ($kemampuan->kualitas_pekerjaan - min($allKaryawan)) / max($allKaryawan) - min($allKaryawan) * $this->bk->kc,
                'kd'  => ($kemampuan->kualitas_pekerjaan - min($allKaryawan)) / max($allKaryawan) - min($allKaryawan) * $this->bk->kd,
                'ke'  => ($kemampuan->kualitas_pekerjaan - min($allKaryawan)) / max($allKaryawan) - min($allKaryawan) * $this->bk->ke,
                'kf'  => ($kemampuan->kualitas_pekerjaan - min($allKaryawan)) / max($allKaryawan) - min($allKaryawan) * $this->bk->kf,
                'kg'  => ($kemampuan->kualitas_pekerjaan - min($allKaryawan)) / max($allKaryawan) - min($allKaryawan) * $this->bk->kg,
                'kh'  => ($kemampuan->kualitas_pekerjaan - min($allKaryawan)) / max($allKaryawan) - min($allKaryawan) * $this->bk->kh,
                'ki'  => ($kemampuan->kualitas_pekerjaan - min($allKaryawan)) / max($allKaryawan) - min($allKaryawan) * $this->bk->ki,
                'kj'  => ($kemampuan->kualitas_pekerjaan - min($allKaryawan)) / max($allKaryawan) - min($allKaryawan) * $this->bk->kj,
                'kk'  => ($kemampuan->kualitas_pekerjaan - min($allKaryawan)) / max($allKaryawan) - min($allKaryawan) * $this->bk->kk,
                'kl'  => ($objektivitas->total_poin - min($allKaryawan)) / max($allKaryawan) - min($allKaryawan) * $this->bk->kl,
            ]);
        }
    }

    public function SMART_SYNC($penilaian)
    {
        $this->SMART_TERNORMALISASI($penilaian);
        $this->SMART_TOTAL($penilaian);
    }
}
