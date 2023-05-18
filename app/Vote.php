<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $table = 'vote';
    protected $fillable = [
        'option','deskripsi', 'nik',
    ];

    public function voting()
    {
        return $this->belongsTo(Voting::class);
    }
}
