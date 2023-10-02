import axios from 'axios';
import { AttendanceData } from '../app/type';

const API_BASE_URL = 'http://localhost:8000/api';
const GET_API = 'http://localhost:8000/api';

export const uploadAttendance = async (file: File) => {
  const formData = new FormData();
  formData.append('file', file);

  try {
    const response = await axios.post(`${API_BASE_URL}/upload-attendance`, formData, {
      headers: {
        'Content-Type': 'multipart/form-data',
      },
    });
    return response.data;
  } catch (error) {
    throw new Error('Error uploading attendance');
  }
};

export const getAttendanceData = async (): Promise<AttendanceData[]> => {
  try {
    const response = await axios.get(`${GET_API}/attendance`);
    return response.data;
  } catch (error) {
    throw new Error('Error fetching attendance data');
  }
};
