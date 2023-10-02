<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AttendanceService; 

class AttendanceController extends Controller
{
    private $attendanceService;

    public function __construct(AttendanceService $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }

    public function uploadAttendance(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xls,xlsx|max:2048',
        ]);

        $file = $request->file('file');

        // Call the service to handle the upload
        $this->attendanceService->uploadAttendance($file);

        return response()->json(['message' => 'File uploaded successfully']);
    }

    public function getAttendance($employeeId)
    {
        $attendance = $this->attendanceService->getAttendance($employeeId);

        return response()->json(['attendance' => $attendance]);
    }
}
