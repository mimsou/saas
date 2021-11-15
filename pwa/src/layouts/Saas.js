import React from "react";
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";

const Saas = () => {
  return (
    <Router>
      <Switch>
        <Route path="saas" />
      </Switch>
    </Router>
  );
};

export default Saas;
