<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Warga extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['nik', 'nokk', 'rt', 'rw', 'nama', 'jk', 'agama','pendidikan','pekerjaan','tanggallahir','tempatlahir','statusperkawinan','email'];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
