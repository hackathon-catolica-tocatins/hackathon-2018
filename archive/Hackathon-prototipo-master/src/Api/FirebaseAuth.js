import Apikey from './ApiKey'
import * as firebase from 'firebase'

firebase.initializeApp(Apikey)

const createUser = (email, password) => (
    firebase.auth().createUserWithEmailAndPassword(email, password)
        .then(res => res)
        .catch(err => err.message)
)

const authUser = (email, password) => (
    firebase.auth().signInWithEmailAndPassword(email, password)
        .then(res => res)
        .catch(err => err.message)
)

const updateDisplayName = (name) => (
    firebase.auth().currentUser.updateProfile({
        displayName: name,
        photoURL: ""
    }).then(
        res => res
    ).catch(
        err => err.message
    )
)

const sendEmail = (email) => (
    firebase.auth().currentUser.sendEmailVerification()
        .then(
            res => res
        ).catch(
            err => err.message
        )
)

const refFire = firebase.auth()

export default {
    createUser,
    authUser,
    updateDisplayName,
    sendEmail,
    refFire,
}