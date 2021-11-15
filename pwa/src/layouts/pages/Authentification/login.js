import {
  Button,
  Card,
  CardActions,
  CardContent,
  CardHeader,
} from "@mui/material";
import Box from '@mui/material/Box';
import TextField from '@mui/material/TextField';
import React from "react";

const Login = () => {
  return (
    <Card className="login-box" variant="outlined">
      <CardHeader className="login-header"></CardHeader>
      <CardContent>
      <Box
      component="form"
      sx={{
        '& .MuiTextField-root': { m: 1, width: '95%' },
      }}
      noValidate
      autoComplete="off"
    >
        <TextField id="standard-basic" label="Login" variant="outlined" />
        <TextField id="outlined-password-input"  label="Password"  variant="outlined"  type="password" autoComplete="current-password" />
      </Box>
      </CardContent>
      <CardActions>
        <Button size="small" color="primary">
          Login
        </Button>
      </CardActions>
    </Card>
  );
};

export default Login;
