<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eskul extends Model
{
    use HasFactory;

    protected $table = 'eskul';
    protected $fillable = ['nama_eskul', 'admin_id', 'hari', 'jam_mulai', 'jam_selesai', 'tempat', 'deskripsi'];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'eskul_id');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'eskul_id');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'eskul_id');
    }

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'pendaftaran', 'eskul_id', 'siswa_id');
    }
}