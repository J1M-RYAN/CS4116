import express from "express";
import db from "../db.js";
import faker from "@faker-js/faker";

const reportRouter = express.Router();
const reportTypes = [
  "Inappropriate content",
  "Fake Profile",
  "Hate speech",
  "Other",
];
reportRouter.get("/", async (req, res) => {
  let response = await db.getAllReports();
  for (let i = 0; i < response.length; i++) {
    response[i].id = i;
  }
  res.json(response);
});

reportRouter.get("/newFakeReport", async (req, res) => {
  let response = await db.getAllProfiles();

  res.json({
    ReporterID: response[Math.floor(Math.random() * response.length)]["UserID"],
    ReportedID: response[Math.floor(Math.random() * response.length)]["UserID"],
    Report: faker.lorem.sentence(10),
    ReportType: reportTypes[Math.floor(Math.random() * reportTypes.length)],
  });
});

reportRouter.post("/createFakeReport", async (req, res) => {
  let fakeReport = req.body;
  let response = await db.insertReport(fakeReport);

  res.sendStatus(200);
});

export default reportRouter;
