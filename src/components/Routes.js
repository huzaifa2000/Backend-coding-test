import React from 'react';
import { BrowserRouter as Router, Route } from 'react-router-dom';
import UploadAttendance from './UploadAttendance';
import AttendanceList from './AttendanceList';

const Routes = () => {
  return (
    <Router>
      <Route exact path="/" component={UploadAttendance} />
      <Route path="/attendance-list" component={AttendanceList} />
    </Router>
  );
};

export default Routes;
