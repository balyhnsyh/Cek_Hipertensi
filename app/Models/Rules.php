<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rules extends Model
{
    use HasFactory;

    protected $fillable = [
        'penyakit_id', 
        'gejala_id', 
        'solusi_id'
    ];

    public function penyakit()
    {
        return $this->belongsTo(DataPenyakit::class, 'penyakit_id', 'id_penyakit');
    }

    public function gejala()
    {
        return $this->belongsTo(DataGejala::class, 'gejala_id', 'id_gejala');
    }

    public function solusi()
    {
        return $this->belongsTo(DataSolusi::class, 'solusi_id', 'id_solusi');
    }
}
