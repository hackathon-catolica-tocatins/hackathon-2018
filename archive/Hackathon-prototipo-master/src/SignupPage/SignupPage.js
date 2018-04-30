import React, { Component } from 'react';
import fireAuth from '../Api/FirebaseAuth'



class SignupPage extends Component {
    constructor(props) {
        super(props)
        this.state = {
            fullName: '',
            date: '',
            email: '',
            password: '',
            passwordConfirm: '',
            cpf: '',
            crm: '',
            specialty: ''
        };

        this.doCreateUser = this.doCreateUser.bind(this)
    }

    doCreateUser() {
        if(this.state.password == this.state.passwordConfirm) {
            fireAuth.createUser(this.state.email, this.state.password)
            .then(
                fireAuth.updateDisplayName(this.state.fullName),
                fireAuth.sendEmail(this.state.email)
            )
            .catch(
                alert("Deu muita merda agora!!!")
            )
        }
        else
            alert("Senhas não conferem")
            
    }


    render() {
        return (
            <div>
                <form onSubmit={this.doCreateUser}>
                    <input type="text"
                        placeholder="Digite seu nome completo"
                        value={this.state.fullName}
                        onChange={(e) => this.setState({ fullName: e.target.value })}>
                    </input>

                    <input type="text"
                        placeholder="Digite a data de nascimento"
                        value={this.state.date}
                        onChange={(e) => this.setState({ date: e.target.value })}>
                    </input>

                    <input type="text"
                        placeholder="Digite seu endereço de e-mail"
                        value={this.state.email}
                        onChange={(e) => this.setState({ email: e.target.value })}>
                    </input>

                    <input type="password"
                        placeholder="Digite uma senha"
                        value={this.state.password}
                        onChange={(e) => this.setState({ password: e.target.value })}  >
                    </input>

                    <input type="password"
                        placeholder="Confirme a senha"
                        value={this.state.passwordConfirm}
                        onChange={(e) => this.setState({ passwordConfirm: e.target.value })} >
                    </input>

                    <input type="text"
                        placeholder="Digite seu CPF"
                        value={this.state.cpf}
                        onChange={(e) => this.setState({ cpf: e.target.value })} >
                    </input>

                    <input type="text"
                        placeholder="Digite seu Nº do CRM"
                        value={this.state.crm}
                        onChange={(e) => this.setState({ crm: e.target.value })} >
                    </input>

                    <input type="text"
                        placeholder="Digite sua especialidade"
                        value={this.state.specialty}
                        onChange={(e) => this.setState({ specialty: e.target.value })} >
                    </input>

                    <button type="submit" className="btn btn-primary">Cadastrar</button>

                </form>
            </div>
        )
    }
}
export default SignupPage