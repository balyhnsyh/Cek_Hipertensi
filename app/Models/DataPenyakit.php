<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenyakit extends Model
{
    use HasFactory;

    protected $table = 'data_penyakits';
    protected $primaryKey = 'id_penyakit'; // Penulisan primary key yang benar

    protected $fillable = ['id_penyakit', 'nama_penyakit'];

    public function rules()
    {
        return $this->hasMany(Rules::class, 'penyakit_id', 'id_penyakit');
    }

    public function diagnoses()
    {
        return $this->hasMany(Diagnosis::class, 'id_penyakit', 'id_penyakit');
    }

    public function gejalas()
    {
        return $this->hasMany(DataGejala::class, 'id_penyakit', 'id_penyakit');
    }

    public function solusi()
    {
        return $this->hasOne(DataSolusi::class, 'id_penyakit', 'id_penyakit');
    }

    public static function findBasedOnGejalas($gejalaIds)
    {
        return self::whereHas('gejalas', function ($query) use ($gejalaIds) {
            $query->whereIn('id_gejala', $gejalaIds);
        })->first();
    }
}
