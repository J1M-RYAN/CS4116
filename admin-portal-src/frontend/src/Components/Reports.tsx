import React, { useState, useEffect } from "react";
import { DataGrid, GridColDef, GridValueGetterParams } from "@mui/x-data-grid";
import { Button, Dialog, Grid, Typography } from "@mui/material";
import api from "../api/api";
import { Link } from "react-router-dom";
import ReactJson from "react-json-view";
import CasinoIcon from "@mui/icons-material/Casino";
export type Report = {
  ReporterID: Number;
  ReportedID: Number;
  Report: String;
  Date: Date;
  ReportType: String;
};
const columns: GridColDef[] = [
  {
    field: "ReporterID",
    headerName: "Reporter ID",
    type: "number",
    width: 150,
  },
  {
    field: "ReportedID",
    headerName: "Reported ID",
    type: "number",
    width: 150,
  },
  {
    field: "Report",
    headerName: "Report",
    width: 250,
  },
  {
    field: "action1",
    headerName: "View Reporter",
    sortable: false,
    width: 250,
    renderCell: (params) => {
      return (
        <Button
          component={Link}
          to={`/profiles/${params?.getValue(params.id, "ReporterID") || 1}`}
        >
          View reporter
        </Button>
      );
    },
  },
  {
    field: "action2",
    headerName: "View Reported",
    sortable: false,
    width: 250,
    renderCell: (params) => {
      return (
        <Button
          component={Link}
          to={`/profiles/${params?.getValue(params.id, "ReportedID") || 1}`}
        >
          View reporter
        </Button>
      );
    },
  },
];
const Reports = () => {
  const [rows, setRows] = useState<Report[]>([]);
  const [fakeReport, setFakeReport] = useState<Report | null>(null);
  const [fakeReportDialog, setfakeReportDialog] = useState({ isOpen: false });
  const fetchReports = async () => {
    setRows(await (await api.getAllReports()).data);
  };
  useEffect(() => {
    fetchReports();
    handleNewFakeReport();
  }, []);

  const getFakeReport = async () => {
    return await (
      await api.newFakeReport()
    ).data;
  };
  const handleNewFakeReport = async () => {
    setFakeReport(await getFakeReport());
  };
  const handleCreateFakeReport = async () => {
    fakeReport && (await api.createFakeReport(fakeReport));
    await fetchReports();
    setfakeReportDialog({ isOpen: false });
  };
  const handleOpenCreateFakeReport = async () => {
    await handleNewFakeReport();
    setfakeReportDialog({ isOpen: true });
  };

  const handleEdit = (edit: any) => {
    setFakeReport(edit.updated_src);
    return true;
  };
  return (
    <div>
      <Dialog open={fakeReportDialog.isOpen} fullWidth={true} maxWidth={"xl"}>
        {fakeReport && (
          <Typography
            textAlign={"center"}
            variant="h4"
            m={"5"}
            style={{ backgroundColor: "#1976D2", color: "white" }}
          >
            Create Fake Report
          </Typography>
        )}
        {fakeReport && <ReactJson src={fakeReport} onEdit={handleEdit} />}
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
              onClick={() => setfakeReportDialog({ isOpen: false })}
            >
              Close
            </Button>
          </Grid>
          <Grid item xs={6} md={4}>
            <Button variant="contained" onClick={handleNewFakeReport}>
              <CasinoIcon />
            </Button>
          </Grid>
          <Grid item xs={6} md={4}>
            <Button variant="contained" onClick={handleCreateFakeReport}>
              Create Report
            </Button>
          </Grid>
        </Grid>
      </Dialog>
      <div style={{ height: 400, width: "100%" }}>
        <Button
          variant="contained"
          style={{ margin: 20 }}
          onClick={handleOpenCreateFakeReport}
        >
          Create fake report
        </Button>
        <DataGrid
          rows={rows}
          columns={columns}
          pageSize={5}
          rowsPerPageOptions={[5]}
          checkboxSelection
          disableSelectionOnClick
        />
      </div>
    </div>
  );
};

export default Reports;
