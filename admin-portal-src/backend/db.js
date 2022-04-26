import { json } from "express";
import mysql from "mysql";
var connection = mysql.createConnection({
  host: process.env.ENVIRONMENT === "development" ? "localhost" : "db",
  user: "root",
  password: "secret",
  database: "dating_db",
});

const getUserCount = () => {
  return new Promise(function (resolve, reject) {
    connection.query(
      "SELECT COUNT(*) as count FROM User",
      function (err, rows) {
        if (rows === undefined) {
          reject(new Error("Error rows is undefined"));
        } else {
          const obj = Object.values(JSON.parse(JSON.stringify(rows)));
          resolve(obj[0].count);
        }
      }
    );
  });
};

const getUserCountByGender = (gender) => {
  return new Promise(function (resolve, reject) {
    connection.query(
      `SELECT COUNT(*) as count FROM Profile WHERE Gender=\'${gender}\'`,
      function (err, rows) {
        if (rows === undefined) {
          reject(new Error("Error rows is undefined"));
        } else {
          const obj = Object.values(JSON.parse(JSON.stringify(rows)));
          resolve(obj[0].count);
        }
      }
    );
  });
};

const insertUser = async (user) => {
  return new Promise(function (resolve, reject) {
    connection.query(
      `INSERT INTO User(Email, Firstname, Surname, Password, UserType) VALUES ('${
        user.Email
      }','${user.Firstname}','${user.Surname}','${user.Password}','${1}')`,
      function (err, rows) {
        if (rows === undefined) {
          reject(new Error("Error rows is undefined"));
        } else {
          const obj = Object.values(JSON.parse(JSON.stringify(rows)));
          resolve(obj[2]);
        }
      }
    );
  });
};
const insertProfile = async (profile) => {
  return new Promise(function (resolve, reject) {
    connection.query(
      `INSERT INTO Profile(UserID, Age, Height, StarSign, Smoking, Drinking, Gender, Seeking, Religion, Children, Description, Banned, Photo, LocationID) VALUES ('${
        profile.UserID
      }','${profile.Age}','${profile.Height}','${profile.StarSign}','${
        profile.Smoking
      }','${profile.Drinking}','${profile.Gender}','${profile.Seeking}','${
        profile.Religion
      }','${profile.Children ? 1 : 0}','${profile.Description}','${
        profile.Banned ? 1 : 0
      }','${profile.Photo}','${profile.Location.Id}')`,
      function (err, rows) {
        if (rows === undefined) {
          console.log("error", err);
          reject(new Error("Error rows is undefined"));
        } else {
          const obj = Object.values(JSON.parse(JSON.stringify(rows)));
          resolve(obj[2]);
        }
      }
    );
  });
};

const getAllUsers = async () => {
  return new Promise(function (resolve, reject) {
    connection.query(`SELECT * FROM User`, function (err, rows) {
      if (rows === undefined) {
        reject(new Error("Error rows is undefined"));
      } else {
        const obj = Object.values(JSON.parse(JSON.stringify(rows)));
        console.log(rows);
        resolve(rows);
      }
    });
  });
};

const getAllProfiles = async () => {
  return new Promise(function (resolve, reject) {
    connection.query(`SELECT * FROM Profile`, function (err, rows) {
      if (rows === undefined) {
        reject(new Error("Error rows is undefined"));
      } else {
        const obj = Object.values(JSON.parse(JSON.stringify(rows)));
        console.log(rows);
        resolve(rows);
      }
    });
  });
};

const getAllReports = async () => {
  return new Promise(function (resolve, reject) {
    connection.query(`SELECT * FROM Report`, function (err, rows) {
      if (rows === undefined) {
        reject(new Error("Error rows is undefined"));
      } else {
        const obj = Object.values(JSON.parse(JSON.stringify(rows)));
        console.log(rows);
        resolve(rows);
      }
    });
  });
};

const getUser = async (id) => {
  return new Promise(function (resolve, reject) {
    connection.query(
      `SELECT * FROM User WHERE UserID=\"${id}\"`,
      function (err, rows) {
        if (rows === undefined) {
          reject(new Error("Error rows is undefined"));
        } else {
          const obj = Object.values(JSON.parse(JSON.stringify(rows)));
          console.log(rows);
          resolve(rows);
        }
      }
    );
  });
};

const getProfile = async (id) => {
  return new Promise(function (resolve, reject) {
    connection.query(
      `SELECT * FROM Profile WHERE UserID=\"${id}\"`,
      function (err, rows) {
        if (rows === undefined) {
          reject(new Error("Error rows is undefined"));
        } else {
          const obj = Object.values(JSON.parse(JSON.stringify(rows)));
          console.log(rows);
          resolve(rows);
        }
      }
    );
  });
};

const unbanUser = async (id) => {
  return new Promise(function (resolve, reject) {
    connection.query(
      `UPDATE Profile
SET Banned = 0
WHERE UserID =\"${id}\";`,
      function (err, rows) {
        if (rows === undefined) {
          reject(new Error("Error rows is undefined"));
        } else {
          const obj = Object.values(JSON.parse(JSON.stringify(rows)));
          console.log(rows);
          resolve(rows);
        }
      }
    );
  });
};
const banUser = async (id) => {
  return new Promise(function (resolve, reject) {
    connection.query(
      `UPDATE Profile
SET Banned = 1
WHERE UserID =\"${id}\";`,
      function (err, rows) {
        if (rows === undefined) {
          reject(new Error("Error rows is undefined"));
        } else {
          const obj = Object.values(JSON.parse(JSON.stringify(rows)));
          console.log(rows);
          resolve(rows);
        }
      }
    );
  });
};

const insertReport = async (report) => {
  return new Promise(function (resolve, reject) {
    connection.query(
      `INSERT INTO Report(ReporterID, ReportedID, Report, ReportType) VALUES ('${report.ReporterID}','${report.ReportedID}','${report.Report}','${report.ReportType}')`,
      function (err, rows) {
        if (rows === undefined) {
          console.log("error", err);
          reject(new Error("Error rows is undefined"));
        } else {
          const obj = Object.values(JSON.parse(JSON.stringify(rows)));
          resolve(obj[2]);
        }
      }
    );
  });
};

export default {
  getUserCount,
  getUserCountByGender,
  insertUser,
  insertProfile,
  getAllUsers,
  getAllProfiles,
  getUser,
  getProfile,
  unbanUser,
  banUser,
  getAllReports,
  insertReport,
};
