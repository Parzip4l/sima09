<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nik', 'nokk', 'rt','level', 'rw', 'nama', 'jk', 'hubungankk', 'agama','pendidikan','pekerjaan','tanggallahir','tempatlahir','statusperkawinan','email','password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUsiaAttribute()
    {
        return now()->diffInYears($this->tanggal_lahir);
    }

    public function kematian()
    {
        return $this->hasOne(CatatanKematian::class);
    }

    
}
