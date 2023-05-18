<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;

    protected $table = 'guests';

    protected $fillable = [
        'nama',
        'nohp',
        'alamat',
        'tujuan'
    ];

    public function tamu()
    {
        return $this->hasMany(Tamu::class);
    }
}
