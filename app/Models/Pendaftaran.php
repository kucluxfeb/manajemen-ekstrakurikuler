<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    
    protected $table = 'pendaftaran';
    protected $fillable = ['siswa_id', 'eskul_id', 'status', 'tanggal_pendaftaran'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class,'siswa_id');
    }

    public function eskul()
    {
        return $this->belongsTo(Eskul::class,'eskul_id');
    }
}