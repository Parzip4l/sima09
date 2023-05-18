<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mustahiq extends Model
{
    use HasFactory;

    protected $table = 'mustahiq';

    protected $fillable = [
        'uuid',
        'nama',
        'jenis',
        'alamat',
        'telepon',
        'tanggal_diberikan',
        'jumlah_zakat',
        'keterangan',
    ];
}
