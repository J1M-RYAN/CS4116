import express from "express";
import path from "path";
import cors from "cors";
import userRouter from "./routes/users.js";
import db from "./db.js";
import profileRouter from "./routes/profiles.js";
import reportRouter from "./routes/reports.js";

const app = express();
app.use(cors());
app.use(express.json());
app.use("/users", userRouter);
app.use("/profiles", profileRouter);
app.use("/reports", reportRouter);
app.use(express.static(path.join(path.dirname(""), "../frontend/", "build")));

app.get("/", (req, res) => {
  res.sendFile(
    path.join(path.dirname(""), "../frontend/", "build", "index.html")
  );
});

export default app;
