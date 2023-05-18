<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    use HasFactory;
    protected $table = 'voting';

    protected $fillable = ['title','deskripsi', 'options'];

    protected $casts = [
        'options' => 'json',
    ];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
