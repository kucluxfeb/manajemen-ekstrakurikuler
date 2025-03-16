<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;  

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admin';
    protected $guarded = [];

    public function eskul()
    {
        return $this->hasOne(Eskul::class, 'admin_id');
    }
}