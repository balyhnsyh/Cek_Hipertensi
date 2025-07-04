<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSolusi extends Model
{
    use HasFactory;
    
    protected $table = 'data_solusis';
    protected $primaryKey = 'id_solusi'; // Penulisan primary key yang benar
    protected $fillable = ['id_solusi', 'nama_solusi'];

    public function rules()
    {
        return $this->hasMany(Rules::class, 'solusi_id', 'id_solusi');
    }

    public function diagnoses()
    {
        return $this->hasMany(Diagnosis::class, 'id_solusi', 'id_solusi');
    }

    public function penyakit()
    {
        return $this->belongsTo(DataPenyakit::class, 'id_penyakit', 'id_penyakit');
    }

    public static function findBasedOnPenyakit($penyakitId)
    {
        return self::where('penyakit_id', $penyakitId)->first();
    }
}
