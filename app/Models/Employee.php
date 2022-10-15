<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Employee extends Model
{
    use HasFactory, Searchable;
    
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

    public function attendance()
    {
        return $this->hasOne(Attendance::class);
    }

    public function toSearchableArray()
    {
        return [
            'generated_id' => $this->generated_id,
            'fname' => $this->fname,
            'mname' => $this->mname,
            'lname' => $this->lname,
            'gender' => $this->gender,
            'address' => $this->address,
            'contact' => $this->contact,
            'rate_per_day' => $this->rate_per_day,
        ];
    }
}
