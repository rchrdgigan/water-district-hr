<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_in_am',
        'time_out_am',
        'time_in_pm',
        'time_out_pm',
    ];
}
