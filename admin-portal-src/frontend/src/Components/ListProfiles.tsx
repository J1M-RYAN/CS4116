import React, { useEffect, useState } from "react";
import { DataGrid, GridColDef, GridValueGetterParams } from "@mui/x-data-grid";
import { Button } from "@mui/material";
import api from "../api/api";
import { Link } from "react-router-dom";

const columns: GridColDef[] = [
  { field: "UserID", headerName: "UserID", type: "number", width: 90 },
  {
    field: "Age",
    headerName: "Age",
    type: "number",
    width: 100,
  },
  {
    field: "Height",
    headerName: "Height",
    type: "number",
    width: 150,
  },
  {
    field: "StarSign",
    headerName: "Star Sign",
    width: 150,
  },
  {
    field: "Smoking",
    headerName: "Smoking",
    width: 150,
  },
  {
    field: "Drinking",
    headerName: "Drinking",
    width: 150,
  },
  {
    field: "Gender",
    headerName: "Gender",
    width: 150,
  },
  {
    field: "action",
    headerName: "Action",
    sortable: false,
    width: 250,
    renderCell: (params) => {
      return (
        <Button component={Link} to={`/profiles/${params.id}`}>
          Show Profile
        </Button>
      );
    },
  },
];

const ListProfiles = () => {
  const [rows, setRows] = useState([]);

  const fetchUsers = async () => {
    setRows(await (await api.getAllProfiles()).data);
  };
  useEffect(() => {
    fetchUsers();
  }, []);
  return (
    <div style={{ height: 400, width: "100%" }}>
      <DataGrid
        rows={rows}
        columns={columns}
        pageSize={5}
        rowsPerPageOptions={[5]}
        checkboxSelection
        disableSelectionOnClick
      />
    </div>
  );
};

export default ListProfiles;
