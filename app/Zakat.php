<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Zakat extends Model
{
    use HasFactory;

    protected $table = 'zakat';

    protected $fillable = [
        'nama_pembayar',
        'nokk',
        'tanggal_pembayaran',
        'jenis',
        'jumlah_zakat',
        'keterangan',
    ];
}
