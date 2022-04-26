import React, { useEffect, useState } from "react";
import Header from "./Components/Header";

import Users from "./Components/Users";
import {
  BrowserRouter as Router,
  Routes,
  Route,
  Link,
  Navigate,
} from "react-router-dom";
import ListUsers from "./Components/ListUsers";
import ListProfiles from "./Components/ListProfiles";
import Profile from "./Components/Profile";
import { Report } from "@mui/icons-material";
import Reports from "./Components/Reports";

export type FakeUser = {
  User: {
    Firstname: String;
    Surname: String;
    Email: String;
    Password: String;
  };
  Profile: {
    Age: Number;
    Height: Number;
    StarSign: String;
    Smoking: String;
    Drinking: String;
    Gender: String;
    Seeking: String;
    Religion: String;
    Children: Boolean;
    Description: String;
    Location: {
      County: String;
      Id: Number;
    };
    Banned: Boolean;
    Photo: String;
  };
};

const App = () => {
  return (
    <Router>
      <div>
        <Header />
        <Routes>
          <Route path="/" element={<Navigate to="/users" replace />} />
          <Route path="/users" element={<Users />}></Route>
          <Route path="/profiles" element={<ListProfiles />}></Route>
          <Route path="/profiles/:UserId" element={<Profile />} />
          <Route path="/reports" element={<Reports />}></Route>
          <Route path="/listusers" element={<ListUsers />}></Route>
          <Route path="*" element={<Navigate to="/users" replace />} />
        </Routes>
      </div>
    </Router>
  );
};

export default App;
