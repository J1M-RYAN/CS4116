import { FakeUser } from "./../App";
import axios from "axios";
import { Report } from "../Components/Reports";

interface Count {
  count: number;
}
export type UserAndProfile = {
  UserID: Number;
  LastLoginTime: Date;
  SignupDate: Date;
  Email: String;
  Firstname: String;
  Surname: String;
  Password: String;
  Age: 42;
  Height: 173;
  StarSign: String;
  Smoking: String;
  Drinking: String;
  Gender: String;
  Seeking: String;
  Religion: String;
  Description: String;
  Banned: {
    data: Number[];
  };
  Photo: {
    data: Number[];
  };
  LocationID: Number;
};
const baseUrl =
  process.env.REACT_APP_ENVIRONMENT === "development"
    ? "http://localhost:3003"
    : "http://admin_portal:3002";

const getTotalUsers = async () => {
  return await axios.get<Count>(`${baseUrl}/users/totalUsers`);
};

const getTotalMaleUsers = async () => {
  return await axios.get<Count>(`${baseUrl}/users/totalMaleUsers`);
};
const getTotalFemaleUsers = async () => {
  return await axios.get<Count>(`${baseUrl}/users/totalFemaleUsers`);
};

const newFakeUser = async () => {
  return await axios.get<FakeUser>(`${baseUrl}/users/newFakeUser`);
};

const createFakeProfile = async (fakeUser: FakeUser) => {
  console.log("in create profile api client", fakeUser);
  return await axios.post(`${baseUrl}/users/createFakeProfile`, fakeUser);
};

const createFakeReport = async (report: Report) => {
  return await axios.post(`${baseUrl}/reports/createFakeReport`, report);
};
const newFakeReport = async () => {
  return await axios.get(`${baseUrl}/reports/newFakeReport`);
};
const getAllUsers = async () => {
  return await axios.get<[]>(`${baseUrl}/users/`);
};

const getAllProfiles = async () => {
  return await axios.get<[]>(`${baseUrl}/profiles/`);
};

const getUserAndProfileInfo = async (id: Number) => {
  return await axios.get<UserAndProfile>(`${baseUrl}/users/id/${id}`);
};

const unbanUser = async (id: Number) => {
  return await axios.get(`${baseUrl}/users/unban/${id}`);
};
const banUser = async (id: Number) => {
  return await axios.get(`${baseUrl}/users/ban/${id}`);
};

const getAllReports = async () => {
  return await axios.get<Report[]>(`${baseUrl}/reports/`);
};

const api = {
  getTotalUsers,
  getTotalFemaleUsers,
  getTotalMaleUsers,
  newFakeUser,
  createFakeProfile,
  getAllUsers,
  getAllProfiles,
  getUserAndProfileInfo,
  unbanUser,
  banUser,
  getAllReports,
  createFakeReport,
  newFakeReport,
};

export default api;
