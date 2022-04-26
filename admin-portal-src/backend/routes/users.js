import express from "express";
import db from "../db.js";
import faker from "@faker-js/faker";
import axios from "axios";

const userRouter = express.Router();
const starSigns = [
  "Aries",
  "Taurus",
  "Gemini",
  "Cancer",
  "Leo",
  "Virgo",
  "Libra",
  "Scorpio",
  "Sagittarius",
  "Capricorn",
  "Aquarius",
  "Pisces",
];
const smoking = ["Often", "Sometimes", "No"];
const drinking = ["Most days", "Social Drinker", "No"];
const seeking = ["Female", "Male", "Other"];
const religion = [
  "Athiest",
  "Christian",
  "Judaism",
  "Buddhism",
  "Islam",
  "Sikhism",
  "Hinduism",
];
const gender = ["Male", "Female", "Other"];
const county = [
  "Antrim",
  "Armagh",
  "Carlow",
  "Cavan",
  "Clare",
  "Cork",
  "Derry",
  "Donegal",
  "Down",
  "Dublin",
  "Fermanagh",
  "Galway",
  "Kerry",
  "Kildare",
  "Kilkenny",
  "Laois",
  "Leitrim",
  "Limerick",
  "Longford",
  "Louth",
  "Mayo",
  "Meath",
  "Monaghan",
  "Offaly",
  "Roscommon",
  "Sligo",
  "Tipperary",
  "Tyrone",
  "Waterford",
  "Westmeath",
  "Wexford",
  "Wicklow",
];
userRouter.get("/", async (req, res) => {
  let response = await db.getAllUsers();
  for (let i = 0; i < response.length; i++) {
    response[i].id = response[i].UserID;
  }
  res.json(response);
});

userRouter.get("/id/:id", async (req, res) => {
  let id = +req.params.id;
  let responseUser = await db.getUser(id);
  let responseProfile = await db.getProfile(id);
  console.log("id", id);
  res.json({ ...responseUser[0], ...responseProfile[0] });
});
userRouter.get("/unban/:id", async (req, res) => {
  let id = +req.params.id;
  await db.unbanUser(id);

  res.sendStatus(200);
});

userRouter.get("/ban/:id", async (req, res) => {
  let id = +req.params.id;
  await db.banUser(id);

  res.sendStatus(200);
});

userRouter.get("/totalUsers", async (req, res) => {
  let response = await db.getUserCount();
  console.log(response);
  res.json({ count: response });
});

userRouter.get("/totalMaleUsers", async (req, res) => {
  let response = await db.getUserCountByGender("Male");
  console.log(response);
  res.json({ count: response });
});

userRouter.get("/totalFemaleUsers", async (req, res) => {
  let response = await db.getUserCountByGender("Female");
  console.log(response);
  res.json({ count: response });
});

userRouter.get("/newFakeUser", async (req, res) => {
  const countyId = Math.floor(Math.random() * county.length);
  res.json({
    User: {
      Firstname: faker.name.firstName(),
      Surname: faker.name.lastName(),
      Email: faker.internet.email(),
      Password: faker.internet.password(10),
    },
    Profile: {
      Age: faker.datatype.number({
        min: 18,
        max: 80,
      }),
      Height: faker.datatype.number({
        min: 150,
        max: 200,
      }),
      StarSign: starSigns[Math.floor(Math.random() * starSigns.length)],
      Smoking: smoking[Math.floor(Math.random() * smoking.length)],
      Drinking: drinking[Math.floor(Math.random() * drinking.length)],
      Gender: gender[Math.floor(Math.random() * gender.length)],
      Seeking: seeking[Math.floor(Math.random() * seeking.length)],
      Religion: religion[Math.floor(Math.random() * religion.length)],
      Children: Math.random() > 0.5 ? true : false,
      Location: {
        County: county[countyId],
        Id: countyId + 1,
      },
      Description: faker.lorem.paragraph(),
      Banned: Math.random() > 0.5 ? true : false,
      Photo: faker.image.avatar(),
    },
  });
});

userRouter.post("/createFakeProfile", async (req, res) => {
  const body = req.body;
  console.log("in api method", body);
  try {
    const insertId = await db.insertUser(body.User);

    await db.insertProfile({ ...body.Profile, UserID: insertId });
  } catch (error) {
    console.error(error);
  }
  res.send(200);
});

export default userRouter;
