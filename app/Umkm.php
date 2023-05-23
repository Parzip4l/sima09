<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;
    protected $table = 'umkm';
    protected $fillable = [
        'namapemilik','namatoko', 'nomorhp',
    ];
}
