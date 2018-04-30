import React, { Component } from 'react';
import { BrowserRouter as Router, Route, Link } from 'react-router-dom'
import ic_list from '../icons/ic_list_24px.svg'
import ic_person from '../icons/ic_person_24px.svg'
import './Toolbar.css'

class ToolBar extends Component {
    render() {
        return (
            <div>

                <ul className="nav justify-content-center bgToolBar fixed-bottom">
                    <li className="nav-item mx-auto">
                        <Link to='/home' className="btn btn-link" >
                            <img className="icon" src={ic_list} alt="my icon" />
                        </Link>
                    </li>
                    <li className="nav-item mx-auto">
                        <Link to='/profile' className="btn btn-link">
                            <img className="icon" src={ic_person} alt="my icon" />
                        </Link>
                    </li>
                </ul>
            </div>
        )
    }
}
export default ToolBar