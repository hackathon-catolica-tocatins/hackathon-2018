import React, { Component } from 'react';
import './App.css';
import { BrowserRouter as Router, Route, Link } from 'react-router-dom'
import LoginPage from './LoginPage/LoginPage';
import HomePage from './HomePage/HomePage';
import SignupPage from './SignupPage/SignupPage';
import ToolBar from './ToolBar/Toolbar'
import EditPage from './EditPage/EditPage';
import ProfilePage from './ProfilePage/ProfilePage';
import fireAuth from './Api/FirebaseAuth'


class App extends Component {
  render() {
    return (
      <Router>
        <div className="App">
          <Route exact path='/' component={LoginPage}/>
          <Route exact path='/signup' component={SignupPage}/>
          <Route exact path='/home' component={HomePage}/>
          <Route exact path='/edit' component={EditPage}/>
          <Route exact path='/profile' component={ProfilePage}/>
          <Route exact path='/about' component={HomePage}/>
          {
            //fireAuth.refFire.currentUser != null &&
            <ToolBar/>
          }
        </div>
      </Router>
    );
  }
}

export default App;
