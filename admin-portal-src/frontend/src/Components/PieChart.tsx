import * as React from "react";
import { Card as MUICard, CardContent, Typography } from "@mui/material";
import { PieChart as SimplePieChart } from "react-minimal-pie-chart";
import { DataEntry } from "react-minimal-pie-chart/types/commonTypes";
type CardCountProps = {
  title: String;
  data: DataEntry[];
};
const PieChart = ({ title, data }: CardCountProps) => {
  return (
    <MUICard elevation={5}>
      <CardContent>
        <Typography sx={{ fontSize: 14 }} color="text.secondary" gutterBottom>
          {title}
        </Typography>
        <SimplePieChart
          animate={true}
          data={data}
          label={({ dataEntry }) => `${Math.round(dataEntry.percentage)} %`}
        />
      </CardContent>
    </MUICard>
  );
};

export default PieChart;
