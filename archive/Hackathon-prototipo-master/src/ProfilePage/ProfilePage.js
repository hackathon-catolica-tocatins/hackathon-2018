import React, { Component } from 'react'
import fireAuth from '../Api/FirebaseAuth'
import { Redirect } from 'react-router-dom'
import './ProfilePage.css'



class ProfilePage extends Component {

    constructor(props) {
        super(props)

        this.logoutUser = this.logoutUser.bind(this)
    }

    logoutUser() {

    }

    render() {
        return (
            <div className='container'>
                <div className="card mt-3">
                    <div className="card-body">
                    <h5 className="card-title">Dados pessoais</h5>
                        <fieldset disabled>
                            <input type="text" className="form-control mb-1 text-center" placeholder="user_name"/>
                            <input type="text" className="form-control mb-4 text-center" placeholder="user_email"/>
                        </fieldset>
                        <button onClick={this.logoutUser()} className='btn btn-block btn-info'>Alterar senha</button>
                        <button onClick={this.logoutUser()} className='btn btn-block btn-info'>Alterar email</button>
                    </div>
                    <br/>
                    <button onClick={this.logoutUser()} className='btn btn-block btn-danger fixed-bottom mb-5'>Sair</button>
                </div>
            </div>
        )
    }
}

export default ProfilePage