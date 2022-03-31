import * as React from "react";
import { AppBar, Container, Toolbar, Typography } from "@mui/material";

const Header = () => {
  return (
    <AppBar position="static">
      <Container maxWidth="xl">
        <Toolbar disableGutters>
          <Typography>Lovespark Admin Portal</Typography>
        </Toolbar>
      </Container>
    </AppBar>
  );
};

export default Header;
