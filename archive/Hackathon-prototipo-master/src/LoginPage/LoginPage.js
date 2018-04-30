import React, { Component } from 'react'
import fireAuth from '../Api/FirebaseAuth'
import { Redirect } from 'react-router-dom'




class LoginPage extends Component {
    constructor(props) {
        super(props)
        this.state = {
            login: "",
            password: "",
            redirect: false
        }
        this.doLogin = this.doLogin.bind(this)
    }

    doLogin () {
        fireAuth.authUser(this.state.login, this.state.password)
        .then(
            console.log(fireAuth.refFire.currentUser),
            this.setState( {
                redirect: "/home"
            })
        )
        .catch(
        )
    }

    render() {
        return (
            <div className="loginContainer">
            {
                this.state.redirect && <Redirect to= { this.state.redirect }/>
            }
                <form onSubmit={ this.doLogin }>
                    <div className="form-group">
                        <label for="exampleInputEmail1">E-mail</label>
                        <input  type="email" 
                                className="form-control" 
                                id="inputEmail1" 
                                aria-describedby="emailHelp" 
                                placeholder="Enter email"
                                value={ this.state.login }
                                onChange={ (e) => this.setState({login: e.target.value}) }/>
                    </div>
                    <div className="form-group">
                        <label  for="exampleInputPassword1">Senha</label>
                        <input  type="password" 
                                className="form-control" 
                                id="onputPassword1" 
                                placeholder="Password"
                                value={ this.state.password }
                                onChange={ (e) => this.setState({password: e.target.value}) } />
                    </div>
                    <div className="form-group form-check">
                        <input  type="checkbox" 
                                className="form-check-input" 
                                id="check" />
                        <label className="form-check-label" for="check1">Check me out</label>
                    </div>
                    <button type="submit" className="btn btn-primary">Submit</button>
                </form>
            </div>
        )
    }
}
export default LoginPage