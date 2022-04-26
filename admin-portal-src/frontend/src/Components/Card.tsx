import * as React from "react";
import { Card as MUICard, CardContent, Icon, Typography } from "@mui/material";
type CardCountProps = {
  title: String;
  value: String | Number;
  icon: JSX.Element;
};
const CardCount = ({ title, value, icon }: CardCountProps) => {
  return (
    <MUICard elevation={5}>
      <CardContent>
        {icon}
        <Typography sx={{ fontSize: 14 }} color="text.secondary" gutterBottom>
          {title}
        </Typography>
        <Typography sx={{ fontSize: 14 }} color="text.secondary" gutterBottom>
          {value}
        </Typography>
      </CardContent>
    </MUICard>
  );
};

export default CardCount;
