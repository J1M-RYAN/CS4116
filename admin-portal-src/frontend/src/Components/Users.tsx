import { Dialog, Typography, Grid, Button } from "@mui/material";
import React, { useState, useEffect } from "react";
import { FakeUser } from "../App";
import ReactJson from "react-json-view";
import CasinoIcon from "@mui/icons-material/Casino";
import PieChart from "./PieChart";
import api from "../api/api";
import PeopleIcon from "@mui/icons-material/People";
import ManIcon from "@mui/icons-material/Man";
import WomanIcon from "@mui/icons-material/Woman";
import Card from "./Card";
import { Link } from "react-router-dom";

const Users = () => {
  const [fakeUser, setFakeUser] = useState<FakeUser | null>(null);
  const [fakeUserDialog, setFakeUserDialog] = useState({ isOpen: false });
  const [totalUsers, setTotalUsers] = useState(0);
  const [totalMaleUsers, setTotalMaleUsers] = useState(0);
  const [totalFemaleUsers, setTotalFemaleUsers] = useState(0);

  const fetchData = async () => {
    const totalUsersRes = await api.getTotalUsers();
    const totalMaleUsersRes = await api.getTotalMaleUsers();
    const totalFemaleUsersRes = await api.getTotalFemaleUsers();
    setTotalUsers(totalUsersRes.data.count);
    setTotalMaleUsers(totalMaleUsersRes.data.count);
    setTotalFemaleUsers(totalFemaleUsersRes.data.count);
  };

  useEffect(() => {
    fetchData().catch(console.error);
  }, []);

  const handleNewRandomUser = async () => {
    setFakeUser(await getFakeUser());
  };

  const handleCreateFakeUser = async () => {
    if (!fakeUser) {
      return;
    }
    await api.createFakeProfile(fakeUser);
    await fetchData().catch(console.error);
    setFakeUserDialog({ isOpen: false });
  };
  const handleEdit = (edit: any) => {
    setFakeUser(edit.updated_src);
    return true;
  };

  const getFakeUser = async (): Promise<FakeUser> => {
    return await (
      await api.newFakeUser()
    ).data;
  };

  const handleFakeUserButton = async () => {
    setFakeUser(await getFakeUser());
    setFakeUserDialog({ isOpen: true });
  };
  return (
    <div>
      <Dialog open={fakeUserDialog.isOpen} fullWidth={true} maxWidth={"xl"}>
        {fakeUser && (
          <Typography
            textAlign={"center"}
            variant="h4"
            m={"5"}
            style={{ backgroundColor: "#1976D2", color: "white" }}
          >
            Create {fakeUser.User.Firstname} {fakeUser.User.Surname}
          </Typography>
        )}
        {fakeUser && <ReactJson src={fakeUser} onEdit={handleEdit} />}
        <Grid
          container
          m={2}
          alignItems="center"
          justifyContent="center"
          spacing={3}
          textAlign="center"
        >
          <Grid item xs={6} md={4}>
            <Button
              variant="contained"
              onClick={() => setFakeUserDialog({ isOpen: false })}
            >
              Close
            </Button>
          </Grid>
          <Grid item xs={6} md={4}>
            <Button variant="contained" onClick={handleNewRandomUser}>
              <CasinoIcon />
            </Button>
          </Grid>
          <Grid item xs={6} md={4}>
            <Button variant="contained" onClick={handleCreateFakeUser}>
              Create {fakeUser?.User.Firstname}
            </Button>
          </Grid>
        </Grid>
      </Dialog>
      <Grid
        container
        mt={2}
        alignItems="center"
        justifyContent="center"
        spacing={5}
        textAlign="center"
      >
        <Grid item xs={6} md={4}>
          <Button variant="contained" onClick={handleFakeUserButton}>
            Create fake user
          </Button>
        </Grid>
        <Grid component={Link} to="/listusers" item xs={6} md={4}>
          <Button variant="contained">List Users</Button>
        </Grid>
      </Grid>
      <Grid
        container
        mt={2}
        alignItems="center"
        justifyContent="center"
        spacing={5}
      >
        <Grid item xs={6} md={4}>
          <Card
            title={"Total Users"}
            value={totalUsers}
            icon={<PeopleIcon />}
          />
        </Grid>
        <Grid item xs={6} md={4}>
          <Card title={"Total Men"} value={totalMaleUsers} icon={<ManIcon />} />
        </Grid>
        <Grid item xs={6} md={4}>
          <Card
            title={"Total Women"}
            value={totalFemaleUsers}
            icon={<WomanIcon />}
          />
        </Grid>
        <Grid item xs={6} md={4}>
          <PieChart
            title="Ratio of Genders"
            data={[
              {
                title: "Men",
                value: totalMaleUsers,
                color: "blue",
              },
              { title: "Women", value: totalFemaleUsers, color: "pink" },
            ]}
          />
        </Grid>
      </Grid>
    </div>
  );
};

export default Users;
