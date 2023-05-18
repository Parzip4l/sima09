<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Log;
use App\Observers\BeritaObserver;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';

    protected $fillable = [
        'judul',
        'konten',
        'gambar',
    ];

    // protected static function boot()
    // {
    //     parent::boot();
    //     Berita::observe(BeritaObserver::class);
    // }
}
