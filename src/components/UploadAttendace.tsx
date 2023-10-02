import React from 'react';
import { useDispatch } from 'react-redux';
import { uploadAttendanceAsync } from '../slices/attendanceSlice';

const UploadAttendance: React.FC = () => {
  const dispatch = useDispatch();

  const handleUpload = (event: React.ChangeEvent<HTMLInputElement>) => {
    const file = event.target.files?.[0];
    if (file) {
      dispatch(uploadAttendanceAsync(file));
    }
  };

  return (
    <div>
      <h2>Upload Attendance</h2>
      <input type="file" onChange={handleUpload} />
    </div>
  );
};

export default UploadAttendance;
