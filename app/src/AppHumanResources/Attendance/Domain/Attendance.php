<?php

namespace App\AppHumanResources\Attendance\Domain;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'employee_id',
        'name',
        'checkin_time',
        'checkout_time',
        'total_working_hours',
    ];

    public function employee()
    {
        return $this->belongsTo(\App\AppHumanResources\Employee::class);
    }

    public function schedule()
    {
        return $this->belongsTo(\App\AppHumanResources\Schedule::class);
    }
}
