<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posisi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }

    public function indikator()
    {
        return $this->hasMany(IndikatorKerja::class);
    }

    public function objektivitas()
    {
        return $this->hasMany(Objektivitas::class);
    }
}
