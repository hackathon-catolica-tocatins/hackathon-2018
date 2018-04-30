import ApiKey from './ApiKey'
import * as firebase from 'firebase'


//firebase.initializeApp(ApiKey)


function createProntuario(patientName, cpf, description, path) {
    
        alert(path),
        firebase.database().ref("pacientes/cpf/" + path).set({
            name: patientName,
            //date: this.date,
            //patientName: patientName,
            //medicalName: this.medicalName,
            cpf: cpf,
            description: description,
        })
}

export default {
    createProntuario
}