<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = [
        'nama_admin', 'email', 'nomor_hp', 'password',
        'jabatan', 'foto_profil', 'is_active',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'password'  => 'hashed',   // otomatis di-bcrypt saat disimpan
            'is_active' => 'boolean',
        ];
    }
}
