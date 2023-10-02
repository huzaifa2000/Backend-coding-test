<?php

namespace App\AppHumanResources\Attendance\Application;

use App\AppHumanResources\Attendance\Domain\Attendance;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AttendanceImport;

class AttendanceService
{
    public function uploadAttendance($file)
    {
        Excel::import(new AttendanceImport, $file);
    }

    public function getAttendance($employeeId)
{
    $employee = \App\AppHumanResources\Employee::find($employeeId);

    if (!$employee) {
        throw new \Exception('Employee not found');
    }

    $attendances = $employee->attendance;

    $attendanceData = [];

    foreach ($attendances as $attendance) {
        $name = $employee->name;
        $checkin = $attendance->checkin_time;
        $checkout = $attendance->checkout_time;

        $checkinTime = strtotime($checkin);
        $checkoutTime = strtotime($checkout);
        $totalHours = ($checkoutTime - $checkinTime) / 3600; // Convert seconds to hours

        $attendanceData[] = [
            'Name' => $name,
            'checkin' => $checkin,
            'checkout' => $checkout,
            'total working hours' => $totalHours,
        ];
    }

    return $attendanceData;
}

}
