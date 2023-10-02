import { createSlice, PayloadAction } from '@reduxjs/toolkit';
import { getAttendanceData, uploadAttendance } from '../api/attendanceApi'; // Import the API function
import { AppThunk } from '../app/store';
import { AttendanceData } from '../app/type';

interface AttendanceState {
  data: AttendanceData[];
}

const initialState: AttendanceState = {
  data: [],
};

const attendanceSlice = createSlice({
  name: 'attendance',
  initialState,
  reducers: {
    setAttendanceData(state, action: PayloadAction<AttendanceData[]>) {
      state.data = action.payload;
    },
  },
});

export const { setAttendanceData } = attendanceSlice.actions;

export const fetchAttendanceDataAsync = (): AppThunk => async (dispatch: (arg0: { payload: AttendanceData[]; type: "attendance/setAttendanceData"; }) => void) => {
  try {
    const data = await getAttendanceData();
    dispatch(setAttendanceData(data));
  } catch (error) {
    console.error('Error fetching attendance data:', error);
  }
};
export const uploadAttendanceAsync = (file: File): AppThunk => async (dispatch: (arg0: { payload: AttendanceData[]; type: "attendance/setAttendanceData"; }) => void) => {
    try {
      await uploadAttendance(file);
      const simulatedData: AttendanceData[] = [
        {
          name: 'John Doe',
          checkin: '09:00 AM',
          checkout: '06:00 PM',
          totalWorkingHours: 9,
        },
        {
          name: 'Jane Smith',
          checkin: '09:30 AM',
          checkout: '05:30 PM',
          totalWorkingHours: 8,
        },
      ];
      dispatch(setAttendanceData(simulatedData));
    } catch (error) {
      console.error('Error uploading attendance:', error);
    }
  };

export default attendanceSlice.reducer;
