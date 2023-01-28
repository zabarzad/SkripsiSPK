<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disiplin extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    
}
