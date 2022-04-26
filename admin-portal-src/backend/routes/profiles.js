import express from "express";
import db from "../db.js";

const profileRouter = express.Router();

profileRouter.get("/", async (req, res) => {
  let response = await db.getAllProfiles();
  for (let i = 0; i < response.length; i++) {
    response[i].id = response[i].UserID;
  }
  res.json(response);
});

export default profileRouter;
