import React, { Component } from 'react';
import logo from '../icons/logo.svg'
import ic_camera from '../icons/ic_camera_alt_24px.svg'
import './HomePage.css'

class HomePage extends Component {
    constructor(props) {
        super(props)

        this.renderList = this.renderList.bind(this)
        this.search = this.search.bind(this)

        this.state = {
            user_name: 'USER_NAME',
            patitent_list: [
                { name: 'patiente_one | 000.000.000-00' },
                { name: 'patiente_two | 111.111.111-11' }
            ]
        }
    }

    handlerClickList(e) {
        console.log(e.target.innerText)
    }

    renderList(item, index) {
        return (
            <a key={index} onClick={(e) => this.handlerClickList(e)} className="list-group-item list-group-item-action">{item.name}</a>
        )
    }

    search(input) {
        console.log(...this.patitent_list)
        //this.patitent_list.filter( input )
    }

    render() {
        return (
            <div className='container mt-5 HomePage'>
                <div className='row justify-content-center align-items-center fixed-top mt-2 mb-2'>
                    <div className='col-3'>
                        <img className="icon logo" src={logo} alt="my icon" />
                    </div>
                    <div className='col'>
                        <h4>{this.state.user_name}</h4>
                    </div>
                </div>
                <div className='container row justify-content-center  mt-5'>
                    <div className='col-10 mt-5'>
                        <input type="text" onChange={(e) => this.search(e.target.value)} className="form-control" aria-label="Default" placeholder='Buscar...' aria-describedby="inputGroup-sizing-default" />

                    </div>
                    <div className='col-1 mt-5'>
                        <button className='btn btn-light'>
                        <img className="icon" src={ic_camera} alt="my icon" />
                        </button>
                    </div>


                </div>
                <br />
                <div className='row justify-content-center align-middle mt-2'>
                    <div className="list-group">
                        {
                            this.state.patitent_list.map(this.renderList)
                        }
                    </div>
                </div>
                <br />
                <div className='row justify-content-center mb-5'>
                    <button type="button" className="btn btn-info btn-block ml-4 mr-4">Adicionar paciente</button>
                </div>

            </div>
        )
    }
}
export default HomePage