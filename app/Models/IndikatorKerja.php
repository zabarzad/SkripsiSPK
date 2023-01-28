<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorKerja extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function posisi()
    {
        return $this->belongsTo(Posisi::class);
    }

    public function object_detail()
    {
        return $this->hasMany(ObjDetail::class);
    }
}
