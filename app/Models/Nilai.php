<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    
    protected $table = 'nilai';
    protected $fillable = ['siswa_id', 'eskul_id', 'nilai', 'tanggal_penilaian', 'keterangan'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function eskul()
    {
        return $this->belongsTo(Eskul::class, 'eskul_id');
    }
}