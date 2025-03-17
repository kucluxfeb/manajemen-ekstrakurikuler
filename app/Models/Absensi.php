<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'abesnsi';
    protected $fillable = ['siswa_id', 'eskul_id', 'tanggal_absen', 'status', 'keterangan'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function eskul()
    {
        return $this->belongsTo(Eskul::class,'eskul_id');
    }
}