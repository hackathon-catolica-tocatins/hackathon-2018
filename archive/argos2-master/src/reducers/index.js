import { SET_POSITION } from '../actions'

const stateInitial = {
    latitude: 0,
    longitude: 0
}


const positionReducer = (state = stateInitial, action) => {
    switch(action){

        case SET_POSITION:

        default:
            return state;

    }


}