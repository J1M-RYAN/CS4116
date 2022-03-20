import express from "express";
import path from "path";
import cors from "cors";

const app = express();
app.use(cors());
app.use(express.static(path.join(path.dirname(""), "../frontend/", "build")));

app.get("/", (req, res) => {
  res.sendFile(
    path.join(path.dirname(""), "../frontend/", "build", "index.html")
  );
});

export default app;
