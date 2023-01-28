<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function objektivitas()
    {
        return $this->belongsTo(Objektivitas::class);
    }
    
    public function indikator_kerja()
    {
        return $this->belongsTo(IndikatorKerja::class);
    }
}
