<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\AppHumanResources\Attendance\Domain\Attendance;

class AttendanceImport implements ToModel
{
    public function model(array $row)
    {
        return new Attendance([
            'Name' => $row[0], 
            'checkin' => $row[1],
            'checkout'  => $row[2],
            'totalhours'  => $row[3],
        ]);
    }
}
