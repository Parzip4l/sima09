<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table = 'logs';

    protected $fillable = [
        'action',
        'model',
        'user_id',
        'user_name',
        'old_values',
        'new_values'
    ];
}
