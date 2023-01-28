<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objektivitas extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function posisi()
    {
        return $this->belongsTo(Posisi::class);
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function obj_detail()
    {
        return $this->hasMany(ObjDetail::class);
    }
}
