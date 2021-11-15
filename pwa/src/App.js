import React from 'react';
import './assets/css/App.css';
import { BrowserRouter as Router , Switch , Route , Redirect } from 'react-router-dom'; 
import Saas from 'layouts/Saas';
import Auth from 'layouts/Auth';

function App() {
  return (
    <Router>
      <Switch>
        <Route path="/saas" render={(props)=> <Saas {...props} /> } /> 
        <Route path="/auth" render={(props)=> <Auth {...props} /> } /> 
        <Redirect from="/" to="/auth/login" />
      </Switch>
    </Router>
  );
}

export default App;
