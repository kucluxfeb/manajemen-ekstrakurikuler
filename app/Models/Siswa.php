<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable
{
    use HasFactory;
    
    protected $table = 'siswa';
    protected $fillable = ['nama_lengkap', 'jurusan', 'tingkat_kelas', 'jenis_kelamin', 'email', 'nomor_telepon', 'username', 'password'];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'siswa_id');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'siswa_id');
    }

    public function eskul()
    {
        return $this->belongsToMany(Eskul::class, 'pendaftaran', 'siswa_id', 'eskul_id');
    }
}