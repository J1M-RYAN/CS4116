import React, { useEffect, useState } from "react";
import { DataGrid, GridColDef, GridValueGetterParams } from "@mui/x-data-grid";
import { Button } from "@mui/material";
import api from "../api/api";

const columns: GridColDef[] = [
  { field: "UserID", headerName: "UserID", type: "number", width: 90 },
  {
    field: "Firstname",
    headerName: "First name",
    width: 150,
  },
  {
    field: "Surname",
    headerName: "Last name",
    width: 150,
  },
  {
    field: "Email",
    headerName: "Email",
    minWidth: 250,
  },
  {
    field: "fullName",
    headerName: "Full name",
    description: "This column has a value getter and is not sortable.",
    sortable: false,
    width: 160,
    valueGetter: (params: GridValueGetterParams) =>
      `${params.row.Firstname || ""} ${params.row.Surname || ""}`,
  },
  {
    field: "action",
    headerName: "Action",
    sortable: false,
    renderCell: (params) => {
      const onClick = (e: any) => {
        e.stopPropagation(); // don't select this row after clicking

        console.log(params.id);
      };

      return <Button onClick={onClick}>Delete</Button>;
    },
  },
];

const ListUsers = () => {
  const [rows, setRows] = useState([]);

  const fetchUsers = async () => {
    setRows(await (await api.getAllUsers()).data);
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

export default ListUsers;
