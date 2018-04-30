import React, { Component } from 'react';
import logo from '../icons/logo.svg'
import './EditPage.css'
import ic_back from '../icons/ic_arrow_back_24px.svg'
import ic_edit from '../icons/ic_mode_edit_24px.svg'
import ic_send from '../icons/ic_send_24px.svg'

import fireStorage from '../Api/FirebaseFirestore'

class EditPage extends Component {
    constructor(props) {
        super(props)
        this.state = {
            patientName: "",
            cpf: "",
            description: ""
        }
        this.createPront = this.createPront.bind(this)
    }

    createPront() {
        let data = new Date();
        let path = ''
        path = data.getDate() + "-" + data.getMonth() + "-" + data.getFullYear() + "*" + data.getHours() + ":" + data.getMinutes(),
        fireStorage.createProntuario(this.state.patientName, this.state.cpf, this.state.description, path)
    }

    render() {
        return (
            <div className="card container" style={{ width: 18 + 'rem' }}>
                <div className="card-body">
                    <h5 className="card-title">Prontuario</h5>
                    <div className="card-body">


                        <div className="form-group">
                            <input type="text" className="form-control" id="patientName"
                                aria-describedby="patientHelp" placeholder="Nome do paciente" value={this.state.patientName}
                                onChange={(e) => this.setState({ patientName: e.target.value })} />
                        </div>
                        <div className="form-group">
                            <input type="number" className="form-control" id="patientCpf"
                                aria-describedby="cpfHelp" placeholder="cpf" value={this.state.cpf}
                                onChange={(e) => this.setState({ cpf: e.target.value })} />
                        </div>
                        <div className="form-group">
                            <textarea className="form-control" id="exampleFormControlTextarea1"
                                rows="5" placeholder='Descrição do prontuario' value={this.state.description}
                                onChange={(e) => this.setState({ description: e.target.value })}></textarea>
                        </div>
                        <fieldset disabled>
                            <div className="form-group">
                                <input type="text" className="form-control disabled" id="disabledTextInput" aria-describedby="patientHelp" placeholder="Nome do medico" />
                            </div>
                        </fieldset>

                        <div className='row'>
                            <div className='col mx-auto'>
                                <button className="btn btn-link" type="button">
                                    <img className="icon" src={ic_back} alt="my icon" />
                                </button>
                            </div>
                            <div className='col mx-auto'>
                                <button className="btn btn-link" type="button" onClick={this.createPront}>
                                    <img className="icon" src={ic_send} alt="my icon" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
export default EditPage