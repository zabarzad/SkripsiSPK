<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BobotKriteria;
use App\Models\IndikatorKerja;
use App\Models\Karyawan;
use App\Models\Posisi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('123456'),
        ]);

        $posisi = array('Trade Marketing & Design', 'Accounting & Kasir', 'Purchasing', 'Admin', 'Receptionist', 'General Affair', 'OB',);
        foreach ($posisi as $item) {
            Posisi::create([
                'nama' => $item
            ]);
        }

        $karyawan = array('P1', 'P2', 'P3', 'P4', 'P5', 'P6', 'P7', 'P8', 'P9', 'P10', 'P11', 'P12', 'P13', 'P14', 'P15', 'P16', 'P17', 'P18', 'P19', 'P20');
        foreach ($karyawan as $item) {
            Karyawan::create([
                'nama' => $item,
                'posisi_id' => rand(1, 7)
            ]);
        }


        IndikatorKerja::create([
            'nama' => 'Ketepatan desain dari permintaan user',
            'posisi_id' => 1
        ]);
        IndikatorKerja::create([
            'nama' => 'Ketepatan waktu dalam pembuatan desain',
            'posisi_id' => 1
        ]);
        IndikatorKerja::create([
            'nama' => 'Penyajian laporan marketing, sell out tepat waktu',
            'posisi_id' => 1
        ]);

        IndikatorKerja::create([
            'nama' => 'Akurasi Penyajian laporan keuangan perusahaan',
            'posisi_id' => 2
        ]);
        IndikatorKerja::create([
            'nama' => 'Ketepatan waktu Penyajian laporan keuangan perusahaan',
            'posisi_id' => 2
        ]);
        IndikatorKerja::create([
            'nama' => 'Kerapihan pengarsipan jurnal dan laporan keuangan',
            'posisi_id' => 2
        ]);

        IndikatorKerja::create([
            'nama' => 'Ketepatan waktu dalam memenuhi kebutuhan karyawan',
            'posisi_id' => 3
        ]);
        IndikatorKerja::create([
            'nama' => 'Tingkat kesalahan dalam bekerja',
            'posisi_id' => 3
        ]);
        IndikatorKerja::create([
            'nama' => 'Kualitas relasi Vendor yang dimiliki (dari segi pembayaran, kecepatan pemenuhan, kualitas barang)',
            'posisi_id' => 3
        ]);

        IndikatorKerja::create([
            'nama' => 'Ketepatan Invoice tagihan',
            'posisi_id' => 4
        ]);
        IndikatorKerja::create([
            'nama' => 'Tingkat kesalahan dalam bekerja',
            'posisi_id' => 4
        ]);
        IndikatorKerja::create([
            'nama' => 'Jumlah temuan Tim Audit saat stock Opname',
            'posisi_id' => 4
        ]);

        IndikatorKerja::create([
            'nama' => 'Gaya bicara, intonasi, artikulasi pada saat terima telpon',
            'posisi_id' => 5
        ]);
        IndikatorKerja::create([
            'nama' => 'Senyum, Mengucapkan salam, selamat datang/ pagi/ siang kepada tamu yang datang',
            'posisi_id' => 5
        ]);
        IndikatorKerja::create([
            'nama' => 'Penampilan dalam bekerja (merapikan diri, berhias dll)',
            'posisi_id' => 5
        ]);
        IndikatorKerja::create([
            'nama' => 'Ketepatan dalam laporan, Cek klaim dan form karyawan',
            'posisi_id' => 5
        ]);

        IndikatorKerja::create([
            'nama' => 'Ketepatan waktu dalam memenuhi kebutuhan karyawan',
            'posisi_id' => 6
        ]);
        IndikatorKerja::create([
            'nama' => 'Kualitas vendor logistik dan bengkel rekaman',
            'posisi_id' => 6
        ]);
        IndikatorKerja::create([
            'nama' => 'Kecepatan dan keakuratan dalam penyeselaian perdin',
            'posisi_id' => 6
        ]);
        IndikatorKerja::create([
            'nama' => 'Kerapian data perdin, service, pengiriman',
            'posisi_id' => 6
        ]);

        IndikatorKerja::create([
            'nama' => 'Ketepatan waktu dalam memenuhi kebutuhan karyawan',
            'posisi_id' => 7
        ]);
        IndikatorKerja::create([
            'nama' => 'Tingkat kesalahan dalam bekerja',
            'posisi_id' => 7
        ]);
        IndikatorKerja::create([
            'nama' => 'Kehadiran di saat diperlukan',
            'posisi_id' => 7
        ]);
        IndikatorKerja::create([
            'nama' => 'Intensitas pemilihan fasilitas kantor',
            'posisi_id' => 7
        ]);

        //create seeder bobot kriteria
        BobotKriteria::create([
            'k1' => 0.25,
            'k2' => 0.1,
            'k3' => 0.1,
            'ka' => 0.04,
            'kb' => 0.04,
            'kc' => 0.04,
            'kd' => 0.04,
            'ke' => 0.04,
            'kf' => 0.04,
            'kg' => 0.04,
            'kh' => 0.04,
            'ki' => 0.04,
            'kj' => 0.04,
            'kk' => 0.04,
            'kl' => 0.11,
        ]);
    }
}
