<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'alamat', 'tanggal_lahir', 'nomor_telepon', 'jenis_kelamin', 'id_pasien',
    ];

    public function diagnoses()
    {
        return $this->hasMany(Diagnosis::class, 'id_pasien');
    }

    public function user()
{
    return $this->belongsTo(User::class, 'id_pasien',  'id');
}

    
}
