<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelahiran extends Model
{
    use HasFactory;
    protected $table = 'kelahiran';
    protected $fillable = ['nama', 'tanggallahir','jk', 'tempatlahir','panjang', 'berat', 'ayah', 'ibu','alamat','namapelapor','tanggallaporan','nomortelepon'];
}
