<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturRW extends Model
{
    use HasFactory;

    protected $table = 'rws';

    protected $fillable = [
        'penasehat',
        'ketuarw',
        'ketuart1',
        'ketuart2',
        'ketuart3',
        'ketuart4',
        'bendahara',
        'sekertaris',
        'rohani',
        'humas',
        'pembangunan',
        'pemudadanolahraga',
    ];
}
