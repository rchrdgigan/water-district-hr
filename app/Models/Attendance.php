<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'date',
        'time_in_am',
        'num_hr_am',
        'status_am',
        'time_out_am',
        'time_in_pm',
        'num_hr_pm',
        'status_pm',
        'time_out_pm',
        'num_hr',
        'status',

    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
