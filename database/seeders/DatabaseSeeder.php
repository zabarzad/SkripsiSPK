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

        $posisi = array('it', 'sales', 'manager', 'chef', 'ob');
        foreach ($posisi as $item) {
            Posisi::create([
                'nama' => $item
            ]);
        }

        $karyawan = array('mamat', 'budi', 'suep');
        foreach ($karyawan as $item) {
            Karyawan::create([
                'nama' => $item,
                'posisi_id' => rand(1, 5)
            ]);
        }

        $indikator = array('tes', 'tess', 'tesss', 'tessss', 'tesssss');
        foreach ($indikator as $item) {
            IndikatorKerja::create([
                'nama' => $item,
                'posisi_id' => rand(2, 5)
            ]);
        }

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
