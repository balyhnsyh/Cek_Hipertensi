<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experts extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'ttl', 'umur', 'profesi', 'tmp_krj', 'no_telp', 'email']; 
}
