import * as React from "react";
import { AppBar, Container, Toolbar, Typography, Button } from "@mui/material";
import { Link } from "react-router-dom";
const Header = () => {
  return (
    <AppBar position="static">
      <Container maxWidth="xl">
        <Toolbar disableGutters>
          <Typography sx={{ mr: 2, display: { xs: "none", md: "flex" } }}>
            Lovespark Admin Portal
          </Typography>
          <Button
            component={Link}
            to="/users"
            variant="text"
            style={{ color: "white" }}
          >
            Users
          </Button>
          <Button
            component={Link}
            to="/profiles"
            variant="text"
            style={{ color: "white" }}
          >
            Profiles
          </Button>
          <Button
            component={Link}
            to="/reports"
            variant="text"
            style={{ color: "white" }}
          >
            Reports
          </Button>
        </Toolbar>
      </Container>
    </AppBar>
  );
};

export default Header;
