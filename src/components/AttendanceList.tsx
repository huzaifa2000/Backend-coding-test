import React, { useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { RootState } from '../app/store';
import { fetchAttendanceDataAsync } from '../slices/attendanceSlice';
import { AttendanceData } from '../app/type';

const AttendanceList: React.FC = () => {
  const dispatch = useDispatch();
  const attendanceData = useSelector((state: RootState) => state.attendance.data);

  useEffect(() => {
    dispatch(fetchAttendanceDataAsync());
  }, [dispatch]);

  return (
    <div>
      <h2>Attendance List</h2>
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Check-in</th>
            <th>Check-out</th>
            <th>Total Working Hours</th>
          </tr>
        </thead>
        <tbody>
          {attendanceData.map((item: AttendanceData, index: number) => (
            <tr key={index}>
              <td>{item.name}</td>
              <td>{item.checkin}</td>
              <td>{item.checkout}</td>
              <td>{item.totalWorkingHours}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

export default AttendanceList;
