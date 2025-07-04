<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGejala extends Model
{
    use HasFactory;
    protected $table = 'data_gejalas';

    protected $primarykey = 'id_gejalas';

    protected $fillable = ['id_gejala', 'nama_gejala'];

    public function rules()
    {
        return $this->hasMany(Rules::class, 'gejala_id');
    }

    // A symptom can belong to many diagnoses
    public function diagnoses()
    {
        return $this->hasMany(Diagnosis::class, 'id_gejala');
    }

    // A symptom belongs to a disease
    public function penyakit()
    {
        return $this->belongsTo(DataPenyakit::class, 'id_penyakit');
    }
}
