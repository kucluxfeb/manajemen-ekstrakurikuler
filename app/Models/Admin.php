<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;  

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admin';
    protected $fillable = ['nama_lengkap', 'email', 'nomor_telepon', 'password', 'role'];

    public function eskul()
    {
        return $this->hasOne(Eskul::class, 'admin_id');
    }
}