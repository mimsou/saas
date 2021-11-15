import React from "react";
import { BrowserRouter as Router, Switch, Route , Redirect} from "react-router-dom";
import Login from "./pages/Authentification/login";


const Auth = () => {
  return (
    <Router>
      <Switch>
       <Route path="/auth/login" render={(props)=> <Login {...props} /> } />
       <Redirect from="/" to="/auth/login" />
      </Switch>
    </Router>
  );
};

export default Auth;
