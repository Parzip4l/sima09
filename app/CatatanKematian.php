<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanKematian extends Model
{
    use HasFactory;

    protected $table = 'catatan_kematian';
    protected $fillable = ['nik', 'nokk', 'nama','jk','tanggallahir','agama','rt','rw','tanggalmeninggal'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

    
