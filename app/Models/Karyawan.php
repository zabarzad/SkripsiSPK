<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function posisi()
    {
        return $this->belongsTo(Posisi::class);
    }

    public function disiplin()
    {
        return $this->hasMany(Disiplin::class);
    }

    public function kemampuan()
    {
        return $this->hasMany(Kemampuan::class);
    }

    public function objektivitas()
    {
        return $this->hasMany(Objektivitas::class);
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }

    public function smartNilaiUtility()
    {
        return $this->hasMany(SmartNilaiUtility::class);
    }

    public function smartHasil()
    {
        return $this->hasMany(SmartHasil::class);
    }

    public function wp()
    {
        return $this->hasMany(WpHasil::class);
    }

    public function topsis()
    {
        return $this->hasMany(TopsisHasil::class);
    }
}
