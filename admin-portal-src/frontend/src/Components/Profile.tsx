import React, { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import {
  Card,
  CardActionArea,
  CardContent,
  Typography,
  Button,
} from "@mui/material";
import api, { UserAndProfile } from "../api/api";
const Profile = () => {
  const [user, setUser] = useState<UserAndProfile>();

  let { UserId } = useParams();

  const updateUser = async () => {
    if (UserId) setUser((await api.getUserAndProfileInfo(+UserId)).data);
  };
  useEffect(() => {
    updateUser();
  }, []);

  const handleBan = async () => {
    const banned = user?.Banned.data[0] === 49;
    if (banned) {
      user?.UserID && (await api.unbanUser(user.UserID));
    } else {
      user?.UserID && (await api.banUser(user.UserID));
    }
    await updateUser();
  };
  return (
    <Card elevation={5} style={{ margin: 30 }}>
      <CardContent style={{ margin: 30 }}>
        <Typography>Firstname {user?.Firstname} </Typography>
        <Typography>Surname: {user?.Surname} </Typography>
        <Typography>Email: {user?.Email}</Typography>
        <Typography>Age: {user?.Age}</Typography>
        <Typography>Religion: {user?.Religion}</Typography>
        <Typography>Gender: {user?.Gender}</Typography>
        <Typography>Seeking: {user?.Height}</Typography>
        <Typography>Smoker: {user?.Smoking}</Typography>
        <Typography>Drinker: {user?.Drinking}</Typography>
        <Typography>
          Banned: {user?.Banned.data[0] === 49 ? "Yes" : "No"}
        </Typography>
        <Button variant="contained" onClick={handleBan}>
          {user?.Banned.data[0] === 49 ? "Unban" : "Ban"}
        </Button>
      </CardContent>
    </Card>
  );
};

export default Profile;
