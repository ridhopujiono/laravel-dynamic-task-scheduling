<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $casts = [
        'days' => 'array',
    ];

    public $fillable = ['name', 'frequency', 'time', 'days', 'command', 'active'];
}
