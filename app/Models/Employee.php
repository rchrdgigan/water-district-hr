<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'generated_id',
        'fname',
        'mname',
        'lname',
        'gender',
        'address',
        'birthdate',
        'contact',
        'time_in_am',
        'time_out_am',
        'time_in_pm',
        'time_out_pm',
        'sss',
        'philhealth',
        'pagibig',
        'position',
        'rate_per_day',
        'image',
    ];
}
